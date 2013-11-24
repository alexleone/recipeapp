<?php

App::uses('CheckoutController', 'AppController');

class CheckoutController extends AppController {
	
	public $name = 'checkout';
    public $uses = 'Recipe';
	//public $components = array('Session');
      
	public function index($id, $items) {
    	$array = array();
    	$n = 0;
		$recipe = $this->Recipe->getById($id);
		//working with items
		//check if all ingredients are in db 
		$this->loadModel('Ins');
		$this->loadModel('Products');
		$explodedItems = explode( '_', $items );

		// get products from db
		foreach($explodedItems as $item){
			if ($this->Ins->hasAny(array('in_name' => $item))){
				$in_id = $this->Ins->field('in_id', array('in_name' => $item));
				$array[$item] = $this->Products->query('SELECT * FROM products WHERE in_id ='. $in_id. ';');
				//$array[$item] = $this->Products->find('all', array('conditions' => array('Products.in_id' => $in_id)));
			}
			else {
				$array[$item] = 0;
			}
		}
		
		$this->set('itemsString', $items);
		$this->set('items', $explodedItems);
		$this->set('results', $array);
		
		$recipe = $this->Recipe->getById($id);
		$this->set('recipe', $recipe);
		
		// for disabling recipe submit button
		$display = true;
		if (in_array(0, $array, true) || $this->Recipe->hasAny(array('rec_name' => $recipe['id']))) {
			$display = false;
		}
		$this->set('display', $display);
		
    }
    
	///Mint-Pesto-Martha-Stewart_1/coarse+salt_toast_parsley+leaves_extra-virgin+olive+oil_mint+leaves

	function confirm(){
		
	
	}



}
