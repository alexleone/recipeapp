<?php

App::uses('Cuisines', 'Model');

class Cuisines extends AppModel {

	public $name = 'Cuisines';
	
	public $primaryKey = 'cuis_id';
	public $useTable = 'cuisines';
	
	public $hasMany = array(
	'RecCuisines' => array(
        'className' => 'RecCuisines',
        //'joinTable' => 'reccourses',
        'foreignKey' => 'cuis_id',
        //'associationForeignKey' => 'rec_id',
        'unique' => 'keepExisting',
        'with' => 'RecCuisines',
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
?>