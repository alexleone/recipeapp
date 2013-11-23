<?php

App::uses('RecipesController', 'AppController');

class RecipesController extends AppController {
	
	//public $helpers = array('Html', 'Form');
	public $name = 'Recipes';
    public $uses = 'Recipe';
    //public $components = array('Session');

	public function index() {				
		$this->loadModel('Cuisines');
		$this->loadModel('Courses');
		$this->loadModel('RecCuisines');
		$this->loadModel('RecCourses');
		$this->loadModel('Recipes');
		
		// find cuisines with recipes from db
		$cuisines = $this->RecCuisines->find('all', array('group' => array('Cuisines.type'), 'contain' => array('Cuisines'), 'order' => array('Cuisines.type ASC'), 'limit' => 3));
		$this->set('cuisines', $cuisines);
		
		// find courses with recipes from db
		$courses = $this->RecCourses->find('all', array('group' => array('Courses.type'), 'contain' => array('Courses'), 'order' => array('Courses.type ASC'), 'limit' => 3));
		$this->set('courses', $courses);
    }
    
    public function cuisines() {	
    	$data = $this->request->data;
		$this->set('data', $data);
		$this->loadModel('Cuisines');
		$this->loadModel('RecCuisines');
		$this->loadModel('Recipe');
		
		// get all cuisines types that have associated recipes from db
		$types = array();
		$results = array();
		$types = $this->RecCuisines->find('all', array('group' => array('Cuisines.type'), 'contain' => array('Cuisines'), 'order' => array('Cuisines.type ASC')));
		
		$this->set('types', $types);
		$this->set('results', $results);
    }
    
    public function Courses() {	
    	$data = $this->request->data;
		$this->set('data', $data);
		$this->loadModel('Courses');
		$this->loadModel('RecCourses');
		$this->loadModel('Recipe');
		
		// get all course types from db
		$types = array();
		$results = array();
		$types = $this->RecCourses->find('all', array('group' => array('Courses.type'), 'contain' => array('Courses'), 'order' => array('Courses.type ASC')));
		
		$this->set('types', $types);
		$this->set('results', $results);
    }
	
	public function results($type) {
		$this->loadModel('Cuisines');
		$this->loadModel('Courses');
		$this->loadModel('RecCuisines');
		$this->loadModel('RecCourses');
		$this->loadModel('Recipes');
		
		// find recipes with course/cuisine type
		$recipes = array();
		$results = array();
		if ($type && $this->Cuisines->hasAny(array('type' => $type))){
			$cuis_id = $this->Cuisines->field('cuis_id', array('type' => $type));
			$rec_ids = $this->RecCuisines->query('SELECT rec_id FROM reccuisines WHERE cuis_id ='. $cuis_id. ';');
			$this->set('rec_ids', $rec_ids);
			foreach($rec_ids as $rec_id) {
				$recipes[] = $this->Recipes->find('first', array('conditions' => array('Recipes.rec_id' => $rec_id['reccuisines']['rec_id'])));
			}
		}
		elseif ($type && $this->Courses->hasAny(array('type' => $type))) {
			$cou_id = $this->Courses->field('cou_id', array('type' => $type));
			$rec_ids = $this->RecCourses->query('SELECT rec_id FROM reccourses WHERE cou_id ='. $cou_id. ';');
			$this->set('rec_ids', $rec_ids);
			foreach($rec_ids as $rec_id) {
				$recipes[] = $this->Recipes->find('first', array('conditions' => array('Recipes.rec_id' => $rec_id['reccourses']['rec_id'])));
			}
		}
		else {
		 	$recipes = false;
		}
		
		// call yummly by recipe ID
		if ($recipes != false) {
			foreach ($recipes as $recipe) {
				$results[] = $this->Recipe->getById($recipe['Recipes']['rec_name']);
			}
		}
		
		$this->set('recipes', $recipes);
		$this->set('results', $results);
    }
	
}
