<?php

App::uses('RecipeAdminController', 'AppController');

class RecipeAdminController extends AppController {
	
	public $name = 'RecipeAdmin';
    public $uses = 'Recipe';
    public $components = array(
        'RequestHandler'
    );
    public $helpers = array('Html', 'Form', 'Js'=>array("Jquery")); 
    
	public function index() {
		
    }

    public function cuisines($cuisine) {
    	$recipe = $this->Recipe->getRecipesByCuisine($cuisine);
		$this->set('recipe', $recipe);
		
		$inDb = array();
		foreach ($recipe['matches'] as $r) {
			if ($this->Recipe->hasAny(array('rec_name' => $r['id']))) {
				$inDb[] = true;
			}
			else {
			 	$inDb[] = false;
			}
		}
		
		$this->set('inDb', $inDb);
    }
    
    public function courses($courses) {
		$recipe = $this->Recipe->getRecipesByCourse($courses);
		$this->set('recipe', $recipe);
		
		$inDb = array();
		foreach ($recipe['matches'] as $r) {
			if ($this->Recipe->hasAny(array('rec_name' => $r['id']))) {
				$inDb[] = true;
			}
			else {
				$inDb[] = false;
			}
		}
		$this->set('inDb', $inDb);
    }
    
    public function detail($id, $items) {
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
		
		// displaying recipe submit button
		$display = true;
		if (in_array(0, $array, true) || $this->Recipe->hasAny(array('rec_name' => $recipe['id']))) {
			$display = false;
		}
		$this->set('display', $display);
		
    }
    
    public function store() {
		$itemInfo = $this->request->data;
		$this->set('itemInfo', $itemInfo);
		$this->set('in', array_keys($itemInfo));
		
		// saving selected product items to array
		$data = array();
		$this->loadModel('Ins');
		$this->loadModel('Products');
		
		// if ingredient saved in db, only save products
		if ($this->Ins->hasAny(array('in_name' => $itemInfo['Ins']['0']['ingredient']))) {
			$in_id = $this->Ins->field('in_id', array('in_name' => $itemInfo['Ins']['0']['ingredient']));
			foreach($itemInfo['Ins'] as $i) {
				if ($i['item_checked']) {
					$data[] = array(
						'name' => $i['item_name'], 
						'price' => $i['pricing'],
						'image' => file_get_contents($i['item_image']),
						'description' => $i['item_description'],
						'in_id' => $in_id
					);
 				}		
 			}
 			// saving to db
 			if($this->Products->saveAll($data)){
 			 	$this->Session->setFlash(__('Your Items Have Been Added.'));
 				$this->set('dataPostedToDb', $data);
 			}else{
 				$this->Session->setFlash(__('DB ERROR'));
 				$this->set('dataPostedToDb', 'DB ERROR');
 			}
		}
		// save ingredient and products
		else {
			foreach($itemInfo['Ins'] as $i) {
				if ($i['item_checked']) {
					$data[] = array(
						'name' => $i['item_name'], 
						'price' => $i['pricing'],
						'image' => file_get_contents($i['item_image']),
						'description' => $i['item_description']
					);
 				}		
 			}
		
			// saving ingredient and products to array
			$data = array(
				'Ins' => array('in_name' => $itemInfo['Ins']['0']['ingredient'],
					'Products'=> $data));

			// saving to db
	 		if($this->Ins->saveAll($data, array('deep' => true))){
 			 	$this->Session->setFlash(__('Your Items Have Been Added.'));
 				$this->set('dataPostedToDb', $data);
 			}else{
 				$this->Session->setFlash(__('DB ERROR'));
 				$this->set('dataPostedToDb', 'DB ERROR');
 			}
 		}
 		
		// for link back to recipe
		$items = str_replace('+', '%2B', $itemInfo['Ins']['0']['itemsString']);
 		
 		$this->set('ingredient', $itemInfo['Ins']['0']['ingredient']);
 		$this->set('recipeID', $itemInfo['Ins']['0']['recipeID']);
 		$this->set('itemsString', $items);
    }
    
    public function add() {
		$data = $this->request->data;
		$this->set('data', $data);
		
		// saving selected product items to array
		$this->loadModel('Ins');
		$this->loadModel('Courses');
		$this->loadModel('Cuisines');
		$this->loadModel('RecCourses');
		$this->loadModel('RecCuisines');
		$this->loadModel('RecIns');
		$this->loadModel('Recipe');
		
		$recipeInfo = array();
		$recipeInfo['Recipe'] = $data['Recipe'];
			
		// start Courses
		if (array_key_exists('Courses', $data)) {
			$coursesInfo = array();
			foreach($data['Courses'] as $type) {
				$coursesInfo[] = $this->Courses->find('first', array(
					'conditions' => array('Courses.type' => $type)));
			}
			$reccoursesInfo = array();
			foreach($coursesInfo as $i) {
				$reccoursesInfo[]['cou_id'] = $i['Courses']['cou_id'];
			}
			$recipeInfo['Recipe']['RecCourses'] = $reccoursesInfo;
		}
		//$this->set('couInfo', $coursesInfo);
		// end Courses
		
		// start Cuisines
		if (array_key_exists('Cuisines', $data)) {
			$cuisinesInfo = array();
			foreach($data['Cuisines'] as $type) {
				$cuisinesInfo[] = $this->Cuisines->find('first', array(
					'conditions' => array('Cuisines.type' => $type)));
			}
			$reccuisinesInfo = array();
			foreach($cuisinesInfo as $i) {
				$reccuisinesInfo[]['cuis_id'] = $i['Cuisines']['cuis_id'];
			}
			$recipeInfo['Recipe']['RecCuisines'] = $reccuisinesInfo;
		}
		//$this->set('cuisInfo', $cuisinesInfo);
		// end Cuisines
			
		// start Ins
 		$insInfo = array();
		foreach($data['Ins'] as $in) {
			$insInfo[] = $this->Ins->query("SELECT * FROM ins WHERE in_name ='" .$in['in_name']. "' LIMIT 1;");
		}
		$this->set('insInfo', $insInfo);
 		//$recinsInfo = array();
		foreach($insInfo as $i) {
			$recinsInfo['in_id'] = $i['0']['ins']['in_id'];
		}
		$recipeInfo['Recipe']['RecIns'] = $recinsInfo;
		// end Ins
			
		// save to db
		$this->Recipe->create();
		if($this->Recipe->saveMany($recipeInfo, array('deep' => true))){
			$this->Session->setFlash(__('Your Items Have Been Added.'));
 			$this->set('dataPostedToDb', $recipeInfo);
 		}else{
 			$this->Session->setFlash(__('DB ERROR'));
 			$this->set('dataPostedToDb', 'DB ERROR');
 		}		
    }
	
}
