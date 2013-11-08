<?php

App::uses('RecCourses', 'Model');


class RecCourses extends AppModel {
 	
 	public $name = 'RecCourses';
 	public $useTable = 'reccourses';
 	public $primaryKey = 'id';
	
	public $belongsTo = array(
    'Recipe' => array(
        'className' => 'Recipe',
		//'joinTable' => 'reccourses',
		'foreignKey' => 'cous_id',
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
    'Courses' => array(
        'className' => 'Courses',
        //'joinTable' => 'reccourses',
		'foreignKey' => 'rec_id',
        'associationForeignKey' => 'cous_id',
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
