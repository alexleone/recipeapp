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
		$recipe = $this->Recipe->getById($id);
		//working with items
		//check if all ingredients are in db 
		$this->loadModel('Ins');
		$explodedItems = explode( '-', $items );
		foreach($explodedItems as $item){
			if ($this->Ins->hasAny($item)){
				$this->set('debug', "we got items");
			}
		}
		
		$this->set('debug', $items);
		

		
		$this->set('recipe', $this->Recipe->getById($id));
		
		
    }
	
}
