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
		$this->set('cusine', $cuisine);
// 		Debugger::dump($this->Recipe->getRecipesByCuisine($cuisine));
		$this->set('recipe', $this->Recipe->getRecipesByCuisine($cuisine));
    }
    
    public function courses($courses) {
		
		$this->set('recipe', $this->Recipe->getRecipesByCourse($courses));
		
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
		// foreach($explodedItems as $item){
// 			if ($this->Ins->hasAny(array('in_name' => $item))){
// 				//$this->set('debug', "we got items");
// 				$array[$n] = "we got items";
// 			}
// 			else {
// 				$array[$n] = $this->Ins->getItem($item);
// 				//$this->set('item', $this->Ins->getItem($item));
// 			}
// 			$n++;
// 		}
// 		
// 		$this->set('debug', $items);
// 		
// 		
// 		
// 		$this->set('items', $array);


		foreach($explodedItems as $item){
			if ($this->Ins->hasAny(array('in_name' => $item))){
				//$this->set('debug', "we got items");
				$in_id = $this->Ins->field('in_id', array('in_name' => $item));
				$array[$item] = $this->Products->query('SELECT * FROM products WHERE in_id ='. $in_id. ';');
				//$array[$item] = $this->Products->find('all', array('conditions' => array('Products.in_id' => $in_id)));
			}
			else {
				//$array[$n] = $this->Ins->getItem($item);
				//$this->set('item', $this->Ins->getItem($item));
				$array[$item] = 0;
			}
			//$n++;
		}
		
		$this->set('itemsString', $items);
		$this->set('items', $explodedItems);
		$this->set('results', $array);
		$this->set('recipe', $this->Recipe->getById($id));
		
		
    }
    
    public function store() {
		$itemInfo = $this->request->data;
		$this->set('itemInfo', $itemInfo);
		$this->set('in', array_keys($itemInfo));
		
		$data = array();
		// saving selected product items to array
		$this->loadModel('Ins');
		$this->loadModel('Products');
		
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
		
		// saving ingredient to array
		$data = array(
			'Ins' => array('in_name' => $itemInfo['Ins']['0']['ingredient'],
				'Products'=> $data));


 		if($this->Ins->saveAll($data, array('deep' => true))){
 		 	$this->Session->setFlash(__('Your Items Have Been Added.'));
 			$this->set('dataPostedToDb', $data);
 		}else{
 			$this->Session->setFlash(__('DB ERROR'));
 			$this->set('dataPostedToDb', 'DB ERROR');
 		}
 		

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
