<?php

App::uses('RecipesController', 'AppController');

class RecipesController extends AppController {
	
	//public $helpers = array('Html', 'Form');
	public $name = 'Recipes';
    public $uses = 'Recipe';
    //public $components = array('Session');

	public function index() {
	
    	//get the data from the json file
		//$str_file_info = file_get_contents("recipes.json");
		//decode json into array of objects
		$object_array_file_info = json_decode('{"recipes": [
			{ "recipeName":"Veggie Fried Rice" , "id":"Veggie-Fried-Rice-Naturally-Ella-46312", "rating":"5"}, 
			{ "recipeName":"Ranch Noodles" , "id":"Ranch-Noodles-My-Recipes", "rating":"4" }, 
			{ "recipeName":"Pesto Pasta with Chicken" , "id":"Pesto-Pasta-With-Chicken-Allrecipes", "rating":"3" },
			{ "recipeName":"Garlic Butter Pasta with Spinach and Parmesan" , "id":"Garlic-butter-pasta-with-spinach-and-parmesan-305618", "rating":"4" },
			{ "recipeName":"Easy Penne Pasta with Zucchini and Basil Pesto" , "id":"Easy-penne-pasta-with-zucchini-and-basil-pesto-309343", "rating":"3" },
			{ "recipeName":"Saffron Rice" , "id":"Saffron-Rice-The-Shiksa-Blog-46555", "rating":"3" },
			{ "recipeName":"Chickpea Couscous" , "id":"Chickpea-Couscous-Martha-Stewart", "rating":"4"},
			{ "recipeName":"Cherry Tomato Couscous" , "id":"Cherry-tomato-couscous-308828", "rating":"5" }
			]
		}');
		//just get the array of recipes 
		$arry_of_objects_recipes = $object_array_file_info->recipes;
		//$recipes = "";
		$i=0;
		//loop through the array of objects to find data in each
		foreach($arry_of_objects_recipes as $recipe) {
			$id = $recipe->id;
			$this->set('recipe'.$i++, $this->Recipe->getById($id));
		}
    }
    
    
    
//	 public function recipe($id) {
//         if (!$id) {
//             throw new NotFoundException(__('No Recipe Id'));
//         }
//         $recipe = $this->Recipe->getRecipeById($id);
//         if (!$recipe) {
//             throw new NotFoundException(__('No Recipe Found With That Id: '. $id));
//         }
//         $this->set('recipe', $recipe);
//     }
//     
   
//     public function add() {
//         if ($this->request->is('recipe')) {
//             $this->Recipe->create();
//             if ($this->Post->save($this->request->data)) {
//                 $this->Session->setFlash(__('Your post has been saved.'));
//                 return $this->redirect(array('action' => 'index'));
//             }
//             $this->Session->setFlash(__('Unable to add your post.'));
//         }
//     }
// 	
	

	
	
		

	
}
