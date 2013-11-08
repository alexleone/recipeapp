<?php

App::uses('RecCuisines', 'Model');


class RecCuisines extends AppModel {
 	
 	public $name = 'RecCuisines';
 	public $useTable = 'reccuisines';
 	public $primaryKey = 'id';
	
	public $belongsTo = array(
    'Recipe' => array(
        'className' => 'Recipe',
        'joinTable' => 'reccuisines',
        'foreignKey' => 'cuis_id',
        'associationForeignKey' => 'rec_id',
        'unique' => 'keepExisting',
        'conditions' => '',
        'fields' => '',
        'order' => '',
        'limit' => '',
        'offset' => '',
        'finderQuery' => '',
        'deleteQuery' => '',
        'insertQuery' => ''),
    'Cuisines' => array(
        'className' => 'Cuisines',
        'joinTable' => 'reccuisines',
        'foreignKey' => 'rec_id',
        'associationForeignKey' => 'cuis_id',
        'unique' => 'keepExisting',
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
