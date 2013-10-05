<?php


class IngredientController extends AppController {
	
	public $helpers = array('Html', 'Form');
	public $name = 'Ingredient';	
	//public $components = array('Session');
	
	
	 public function index() {
        $this->set('recipes', $this->Ingredient->);
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
