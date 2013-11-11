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
	 	$search = $this->request->data;
	 	$this->loadModel('Products');
	 	
	 	// if no search params are entered in text field, set 
	 	// if (!isset($item['Ins']['ProductSearch']) || empty($item['Ins']['ProductSearch'])) {
// 	 		$in = $this->Ins->getItem($item['Ins']['Ingredient']);
// 	 	}
// 	 	else {
// 	 		$in = $this->Ins->getItem($item['Ins']['ProductSearch']);
// 	 	}
	 	
	 	$in = $this->Ins->getItem($search['Ins']['ProductSearch']);
	 	$results = array();
	 	
	 	// check if products for ingredient are in db
	 	if ($this->Ins->hasAny(array('in_name' => $search['Ins']['Ingredient']))) {
			$in_id = $this->Ins->field('in_id', array('in_name' => $search['Ins']['Ingredient']));
	 		// if only one result from Supermarket API
	 		if (array_key_exists('Itemname', $in['Product_Commercial'])) {
	 			if ($this->Products->hasAny(array('name' => $in['Product_Commercial']['Itemname'], 'in_id' => $in_id))) {
						$results[] = $in['Product_Commercial']['Itemname'];
					}
		 	}
		 	// if multiple results from Supermarket API
		 	else {
				foreach($in['Product_Commercial'] as $item) {
					if ($this->Products->hasAny(array('name' => $item['Itemname'], 'in_id' => $in_id))) {
						$results[] = $item['Itemname'];
					}
				}
			}
		}
	 	$this->set('results', $results);
	 	
	 	if (isset($in['Product_Commercial']['Itemname']) && $in['Product_Commercial']['Itemname'] == "NOITEM") {
	 		$this->set('in', '');
	 	}
		else {
			$this->set('in', $in);
		}
	 	
	 	$this->set('productSearch', $search['Ins']['ProductSearch']);
	 	$this->set('ingredient', $search['Ins']['Ingredient']);
	 	$this->set('recipeID', $search['Ins']['RecipeID']);
	 	$this->set('itemsString', $search['Ins']['ItemsString']);
	}
	
}
