<?php
App::uses('InsController', 'AppController');

class InsController extends AppController {

	public $helpers = array('Html', 'Form');
	public $name = 'Ins';
    public $uses = 'Ins';
	public $components = array('Session');
	
	 public function index() {
	 	$this->set('in', 'HELLO From Controller, Inside of Inedx()');
	}
	
	 public function get($item) {
	 	$this->set('in', $this->Ins->getItem($item));
	}

	public function add() {
		// Has any form data been POSTed?
		$this->set('item', $this->request->data);
		$itemInfo = $this->request->data;
		$this->set('in', array_keys($itemInfo));
<<<<<<< HEAD
		
		$data = array('item_name' => $itemInfo['Ins']['item_name0'], 'item_description' => $itemInfo['Ins']['item_description0'],
					'item_category' => $itemInfo['Ins']['item_category0'], 'item_image' => $itemInfo['Ins']['item_image0'], 'pricing' => $itemInfo['Ins']['pricing0']);
 		$this->Ins->save($data);		
=======

// 		$keyname = key($itemInfo['Ins']);
// 		$num = substr(key($itemInfo['Ins']),9);

		// saving selected ingredients
		$data = array();
		foreach($itemInfo['Ins'] as $i) {
			if ($i['item_checked']) {
				$data[] = array(
					'item_name' => $i['item_name'], 
					'item_description' => $i['item_description'],
					'item_category' => $i['item_category'], 
					'item_image' => file_get_contents($i['item_image']),
					'pricing' => $i['pricing']
				);
 			}		
 		}
>>>>>>> develop

 		if($this->Ins->saveMany($data)){
 		 	$this->Session->setFlash(__('Your Items Have Been Added.'));
 			$this->set('dataPostedToDb', $data);
 		}else{
 			$this->Session->setFlash(__('DB ERROR'));
 			$this->set('dataPostedToDb', 'DB ERROR');
 		}

	 }
	
}
