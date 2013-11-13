<?php

App::uses('Courses', 'Model');

class Courses extends AppModel {

	public $name = 'Courses';
	
	public $primaryKey = 'cou_id';
	public $useTable = 'courses';
	
	public $hasMany = array(
	'RecCourses' => array(
        'className' => 'RecCourses',
        //'joinTable' => 'reccourses',
        'foreignKey' => 'cou_id',
        //'associationForeignKey' => 'rec_id',
        'unique' => 'keepExisting',
        'with' => 'RecCourses',
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