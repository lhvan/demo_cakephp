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
class BooksController extends Controller {
  
  var $name = "Books";
  public $helpers = array('Common','Html');
  public $components = array('Session');
  public $paginate = array();
  
  function index(){
    
  }
  
  function view01(){
    $data = $this->Book->find("all");
    $this->set("data01",$data);
  }
  
  function view02(){
    $sql = array(
      "conditions" => array(
          "title LIKE" => "PHP%",
          "id !=" => 4,
      ),
      "limit" => "3"
    );
    $data = $this->Book->find("all",$sql);
    $this->set("data02",$data);
    
    $sql01 = "SELECT * FROM books";
    $data03 = $this->Book->query($sql01);
    $this->set("data03",$data03);
    
    $this->set("num_row", $this->Book->getNumRows());
           
  }
  
  
  
  
  //-------------------------
  
  public function paging(){
    $this->paginate = array(
        'limit' => 4,
        'order' => array('id' => 'asc'),
    );
    
    $data = $this->paginate("Book");
    $this->set("data",$data);
  }
  
  public function view($id){
    
    $sql = "SELECT * FROM books WHERE id='".$id."'";
    $data = $this->Book->query($sql);
    $this->set("data", $data);
  }
 
}
