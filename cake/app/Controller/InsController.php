<?php
App::uses('InsController', 'AppController');

class InsController extends AppController {

	public $helpers = array('Html', 'Form');
	public $name = 'Ins';
    public $uses = 'Ins';
	public $components = array('Session');
	
	 public function index($item) {
	 	//$this->set('in', $item);
	 	$this->set('in', $this->Ins->getItem($item));
	}
	
// 	public function add($itemInfo){
// 
//         $data = array('item_id' => $itemInfo[0], 'item_name' => $itemInfo[1], 'item_description' => $itemInfo[2],
// 					'item_category' => $itemInfo[3], 'item_image' => $itemInfo[4], 'pricing' => $itemInfo[5]);
// 		$this->In->save($data);		
//     }

// public function add() {
//          if (!empty($this->$request->data)) { 
//             	print "<script>alert('yhere')</script>";
//             if (isset($this->data['EditArticleForm'])) { // Check if the Edit Form was submitted 
//                 if ($this->EditArticleForm->save($this->data)) { 
//                     $this->Session->setFlash(__('Your item has been saved.'));
//             		return $this->redirect(array('action' => 'index'));
//                 }
//                 $this->Session->setFlash(__('Unable to add your post.'));
//             }
//         } else{
//         	$this->Session->setFlash(__('The request from the view was empty.'));
//         
//         }  
//      }

public function add() {
    // Has any form data been POSTed?
    if ($this->request->is('post')) {
        // If the form data can be validated and saved...
        if ($this->Ins->save($this->request->data)) {
            // Set a session flash message and redirect.
            $this->Session->setFlash('Item Saved!');
            return $this->redirect('/ins');
        }
    }

    // If no form data, find the recipe to be edited
    // and hand it to the view.
    //$this->set('ins', $this->Recipe->findById($id));
}
	
	
	
	
}
