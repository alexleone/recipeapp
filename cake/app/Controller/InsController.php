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
	 
	 public function search() {
	 	$item = $this->request->data;
	 	
	 	if (!isset($item['Ins']['ProductSearch']) || empty($item['Ins']['ProductSearch'])) {
	 		$in = $this->Ins->getItem($item['Ins']['Ingredient']);
	 	}
	 	else {
	 		$in = $this->Ins->getItem($item['Ins']['ProductSearch']);
	 	}
	 	
	 	if (isset($in['Product_Commercial']['Itemname']) && $in['Product_Commercial']['Itemname'] == "NOITEM") {
	 		$this->set('productSearch', $item['Ins']['ProductSearch']);
	 		$this->set('in', '');
	 	}
		else {
	 		$this->set('productSearch', $item['Ins']['ProductSearch']);
			$this->set('in', $in);
		}
	 	
	 	$this->set('item', $item);
	 	$this->set('ingredient', $item['Ins']['Ingredient']);
	 	$this->set('recipeID', $item['Ins']['RecipeID']);
	 	$this->set('itemsString', $item['Ins']['ItemsString']);
	}
	
}
