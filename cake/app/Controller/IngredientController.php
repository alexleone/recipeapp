<?php


class IngredientController extends AppController {
	
	public $helpers = array('Html', 'Form');
	public $name = 'Ingredient';	
	//public $components = array('Session');
	
	
	 public function index() {
        $this->set('recipes', $this->Ingredient->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $recipe = $this->Recipe->getRecipeById($id);
        if (!$recipe) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('recipes', $recipe);
    }

//     public function add() {
//         if ($this->request->is('post')) {
//             $this->Post->create();
//             if ($this->Post->save($this->request->data)) {
//                 $this->Session->setFlash(__('Your post has been saved.'));
//                 return $this->redirect(array('action' => 'index'));
//             }
//             $this->Session->setFlash(__('Unable to add your post.'));
//         }
//     }
	
}
