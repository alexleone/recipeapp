<?php

App::uses('RecipeController', 'AppController');

class RecipeController extends AppController {
	
	public $name = 'Recipe';
    public $uses = 'Recipe';
	//public $components = array('Session');
      
	public function index($id) {
			$this->set('recipe', $this->Recipe->getById($id));
    }
	
}
