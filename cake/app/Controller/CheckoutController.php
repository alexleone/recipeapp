<?php

App::uses('CheckoutController', 'AppController');

class CheckoutController extends AppController {
	
	public $name = 'checkout';
    public $uses = 'Recipe';
	//public $components = array('Session');
      
	public function index($id) {
		$recipe = $this->Recipe->getById($id);
		$this->set('recipe', $recipe);
		$this->loadModel('Ins');
		$this->loadModel('Products');
		$this->loadModel('Recipes');
		$this->loadModel('RecIns');
		
		// get products from db
		$products = array();
		$ins = array();
		$rec_id = $this->Recipes->field('rec_id', array('rec_name' => $recipe['id']));
		$in_ids = $this->RecIns->query('SELECT in_id FROM recins WHERE rec_id ='. $rec_id. ';');
		foreach($in_ids as $in_id) {
			$ins[] = $this->RecIns->query('SELECT * FROM ins WHERE in_id ='. $in_id['recins']['in_id']. ';');
			//$ins[] = $this->RecIns->find('all', array('conditions' => array('Ins.in_id' => $in_id['recins']['in_id'])));
		}
		foreach($ins as $in) {
			$in_name = $in['0']['ins']['in_name'];
			$products[$in_name] = $this->Products->query('SELECT * FROM products WHERE in_id ='. $in['0']['ins']['in_id']. ';');
		}
		$this->set('products', $products);
    }
    
	///Mint-Pesto-Martha-Stewart_1/coarse+salt_toast_parsley+leaves_extra-virgin+olive+oil_mint+leaves

	function confirm(){
		
	
	}



}
