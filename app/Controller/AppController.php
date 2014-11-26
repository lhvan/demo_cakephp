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
App::import('Html', "html");
App::import('Form', "form");
App::import('Session', "session");

class AppController extends Controller {

  public $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Common', 'Paginator');
  public $components = array('Auth');

  function beforeFilter() {
    Security::setHash("md5");
    $this->Auth->userModel = 'User';
    $this->Auth->fields = array('username' => 'username', 'password' => 'password');
    $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');
    $this->Auth->loginRedirect = array('admin' => true, 'controller' => 'users', 'action' => 'index');
    $this->Auth->loginError = 'Username / password combination.  Please try again';
    $this->Auth->authorize = 'controller';

    $this->set("admin", $this->_isAdmin());
    $this->set("logged_in", $this->_isLogin());
    $this->set("users_userid", $this->_usersUserID());
    $this->set("users_username", $this->_usersUsername());
  }
  
 function _isAdmin(){
    $admin = FALSE;
    if($this->Auth->user("level")==1)
        $admin = TRUE;
    return $admin; 
  }
  
   function _isLogin(){
    $login = FALSE;
    if($this->Auth->user()){
        $login = TRUE;
    }
    return $login;
  }
  
   function _usersUserID(){
    $users_userid = NULL;
    if($this->Auth->user())
        $users_userid = $this->Auth->user("id");
    return $users_userid;
  }
  
   function _usersUsername(){
    $users_username = NULL;
    if($this->Auth->user())
        $users_username = $this->Auth->user("username");
    return $users_username;
  }
  
   function isAuthorized() {
        if (isset($this->params['admin'])) {
       
            if ($this->Auth->user('level') != 1) {
                $this->Auth->allow("index");
                $this->redirect("/users");
            }
        }
        return true;
  }

}
