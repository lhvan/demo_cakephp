<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class UsersController extends AppController {

  var $name = "Users";
  var $helpers = array("Html", "Session");
  var $components = array("Session");

  function beforeFilter() {
    parent::beforeFilter();
  }

  function index() {
    $data = $this->User->find("all");
    $this->set("data", $data);
  }

  function admin_index() {

    $data = $this->User->find("all");
    $this->set("data", $data);
  }

  /**
   * Cap nhat user
   */
  function admin_edit($id) {
    if (!$id && empty($this->data)) {
      $this->Session->setFlash('Invalid User');
      $this->redirect("/admin/users");
    }

    if (empty($this->data)) {
      $level = array("1" => "administrator", "2" => "Assistant");
      $this->set("level", $level);
      $this->data = $this->User->read(null, $id);
    } else {
      $this->User->set($this->data);
      if ($this->User->validateUser()) {
        $this->User->save($this->data);
        $this->Session->setFlash("You has been updated user with id =" . $id);
        $this->redirect("/admin/users");
      }
    }

    /**
     * Them moi User
     */
    function admin_add() {
      if (!empty($this->data)) {

        $this->User->set($this->data);
        if ($this->User->validateUser()) {
          $this->User->save($this->data);
          $this->Session->setFlash("You has been add new User !");
          $this->redirect("/admin/users");
        }
      } else {
        $this->render();
      }
    }

    /**
     * Xoa user
     */
    function admin_delete($user_id) {
      if (isset($user_id) && is_numeric($user_id)) {
        $data = $this->User->read(null, $id);
        if (!empty($data)) {
          $this->User->delete($user_id);
          $this->Session->setFlash("Username has been deleted with id=" . $user_id);
        } else {
          $this->Session->setFlash("Username is not avalible with id=" . $user_id);
        }
      } else {

        $this->Session->setFlash("Username is not avalible with id=" . $user_id);
      }
      $this->redirect("/admin/users");
    }

    /**
     * Dang nhap
     */
    function login() {
      if ($this->Auth->user()) {
        $this->redirect($this->Auth->redirect());
      }
    }

    /**
     * Dang xuat
     */
    function logout() {
      $this->redirect($this->Auth->logout());
    }

  }

}
