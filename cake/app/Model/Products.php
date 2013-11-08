<?php

App::uses('Products', 'Model');


class Products extends AppModel {
 	
 	public $name = 'Products';
	
	public $belongsTo = array(
    'Ins' => array(
        'className' => 'Ins',
        'unique' => true,
        'conditions' => '',
        'fields' => '',
        'order' => '',
        'limit' => '',
        'offset' => '',
        'finderQuery' => '',
        'deleteQuery' => '',
        'insertQuery' => ''
    ));
	
}
