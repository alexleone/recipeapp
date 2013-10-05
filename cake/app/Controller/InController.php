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
	
	public function save($itemInfo){
		$data = array('item_id' => $itemInfo[0], 'item_name' => $itemInfo[1], 'item_description' => $itemInfo[2],
					'item_category' => $itemInfo[3], 'item_image' => $itemInfo[4], 'pricing' => $itemInfo[5]);
		$this->In->save($data);		
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
