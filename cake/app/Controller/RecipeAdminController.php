<?php

App::uses('RecipeAdminController', 'AppController');

class RecipeAdminController extends AppController {
	
	public $name = 'RecipeAdmin';
    public $uses = 'Recipe';
     
        
	public function index() {
		$this->set('recipe', 'index method from recipeadmin controller');
    }
	 
	public function get($id) {
		
		$this->set('recipe', $this->Recipe->getRecipesByIngList($id));
    }
    
    public function add($id) {
		
		//$this->set('recipe', $this->Recipe->getRecipesByIngList($id));
    }
	
}
