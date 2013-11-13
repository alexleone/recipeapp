<?php

App::uses('RecIns', 'Model');


class RecIns extends AppModel {
 	
 	public $name = 'RecIns';
 	public $useTable = 'recins';
 	public $primaryKey = 'id';
	
	public $belongsTo = array(
    'Recipe' => array(
        'className' => 'Recipe',
        'joinTable' => 'recins',
        'foreignKey' => 'in_id',
        'associationForeignKey' => 'rec_id',
        'unique' => 'keepExisting',
        'conditions' => '',
        'fields' => '',
        'order' => '',
        'limit' => '',
        'offset' => '',
        'finderQuery' => '',
        'deleteQuery' => '',
        'insertQuery' => ''
),
    'Ins' => array(
        'className' => 'Ins',
        'joinTable' => 'recins',
        'foreignKey' => 'rec_id',
		'associationForeignKey' => 'in_id',
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
