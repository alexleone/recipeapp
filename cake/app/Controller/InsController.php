<?php
App::uses('InsController', 'AppController');

class InsController extends AppController {

	public $helpers = array('Html', 'Form');
	public $name = 'Ins';
    public $uses = 'Ins';
	public $components = array('Session');
	
	 public function index() {
	 	$this->set('in', 'HELLO From Controller, Inside of Inedx()');
	 	//$this->set('in', $this->Ins->getItem($item));
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
		
		//$keyname = key($itemInfo['Ins']);
		$num = substr(key($itemInfo['Ins']),9);
		
		$data = array('item_name' => $itemInfo['Ins']['item_name'.$num], 'item_description' => $itemInfo['Ins']['item_description'.$num],
					'item_category' => $itemInfo['Ins']['item_category'.$num], 'item_image' => $itemInfo['Ins']['item_image'.$num], 'pricing' => $itemInfo['Ins']['pricing'.$num]);
 		$this->Ins->save($data);		

	 }

	
	
	
}
