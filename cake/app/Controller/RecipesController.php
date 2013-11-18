<?php

App::uses('RecipesController', 'AppController');

class RecipesController extends AppController {
	
	//public $helpers = array('Html', 'Form');
	public $name = 'Recipes';
    public $uses = 'Recipe';
    //public $components = array('Session');

	public function index() {		
		$data = $this->request->data;
		$this->set('data', $data);
		// check type value
		if ($data && array_key_exists('cuisine', $data['Recipe'])) {
			$type = $data['Recipe']['cuisine'];
			$type = str_replace('%2B', ' ', $type);
		}
		elseif($data && array_key_exists('course', $data['Recipe'])) {
			$type = $data['Recipe']['course'];
			$type = str_replace('%2B', ' ', $type);
		}
		else {
			$type = false;
		}
		
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
