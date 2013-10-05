<?php


class AdminController extends AppController {
	
	public $helpers = array('Html', 'Form');
	public $name = 'Admin';	
	public $components = array('Session');
	
	
	 public function index() {
        $this->set('admin', 'Studdaaa');
    }

    public function add() {
        if ($this->request->is('item')) {
            $this->Item->create();
            if ($this->Item->save($this->request->data)) {
                $this->Session->setFlash(__('Your item has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }
	
}
