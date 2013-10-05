<?php
App::uses('InController', 'AppController');

class InController extends AppController {

	
	public $helpers = array('Html', 'Form');
	public $name = 'In';	
	public $components = array('Session');
	
	
	 public function index($item) {
		//$this->set('in', $item);
	 	$this->set('in',  $this->In->getItem($item));

    }

//  public function add() {
//         if ($this->request->is('item')) {
//             $this->Item->create();
//             if ($this->Item->save($this->request->data)) {
//                 $this->Session->setFlash(__('Your item has been saved.'));
//                 return $this->redirect(array('action' => 'index'));
//             }
//             $this->Session->setFlash(__('Unable to add your post.'));
//         }
//     }
	
}
