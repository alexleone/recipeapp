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
	 	//$this->set('in', $item);
	 	$this->set('in', $this->Ins->getItem($item));
	}

	public function add() {
		// Has any form data been POSTed?
		$this->set('item', $this->request->data);
		$itemInfo = $this->request->data;
		$this->set('in', array_keys($itemInfo));

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

 		if($this->Ins->saveMany($data)){
 		 	$this->Session->setFlash(__('Your Items Have Been Added.'));
 			$this->set('dataPostedToDb', $data);
 		}else{
 			$this->Session->setFlash(__('DB ERROR'));
 			$this->set('dataPostedToDb', 'DB ERROR');
 		}


	 }

	
	
	
}
