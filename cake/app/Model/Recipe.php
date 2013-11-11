<?php

App::uses('Recipe', 'Model');


class Recipe extends AppModel {
 	
 	public $name = 'Recipe';
 	
 	public $primaryKey = 'rec_id';
	
	// public $hasAndBelongsToMany = array(
//     'Ins' => array(
//         'className' => 'Ins',
//         'joinTable' => 'recins',
//         //'foreignKey' => 'rec_id',
//         //'associationForeignKey' => 'in_id',
//         'unique' => 'keepExisting',
//         'with' => 'RecIns',
//         'conditions' => '',
//         'fields' => '',
//         'order' => '',
//         'limit' => '',
//         'offset' => '',
//         'finderQuery' => '',
//         'deleteQuery' => '',
//         'insertQuery' => ''
//     ));
    
    public $hasMany = array(
    'RecIns' => array(
        'className' => 'RecIns',
       'joinTable' => 'Ins',
        'foreignKey' => 'in_id',
        'associationForeignKey' => 'rec_id',
        'unique' => 'keepExisting',
        'with' => 'RecIns',
        'conditions' => '',
        'fields' => '',
        'order' => '',
        'limit' => '',
        'offset' => '',
        'finderQuery' => '',
        'deleteQuery' => '',
        'insertQuery' => ''
    ),
    'Courses' => array(
        'className' => 'Courses',
        'joinTable' => 'reccourses',
        'foreignKey' => 'cou_id',
        'associationForeignKey' => 'cou_id',
        'unique' => 'keepExisting',
        'with' => 'RecCourses',
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
        'foreignKey' => 'cuis_id',
        'associationForeignKey' => 'cuis_id',
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
    
	
	public function getAppidByPerson($personsName){
		switch($personsName){
			case "jenni":
				 $appid = "5554e9c3";
			break;
			case "drew":
				$appid = "7e0f4b62";
			break;
			case "alex":
				$appid = "8b7fc356";
				break;
		}
		return $appid;
	}
	
	
	public function getAppkeyByPerson($personsName){
		switch($personsName){
			case "jenni":
				$appkey = "76a93afd90d3637f940515fc91fc9e48";
				break;
			case "drew":
				$appkey = "c156d261799467d1898a71842822bdcf";
				break;
			case "alex":
				$appkey = "3d0f6c532b8db2f84758d901d7129167";
				break;
		}
		return $appkey;
	}
	
		
	public function getDataFromYummly($requeststr){
			// CURL for communicating with web service
			//
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$requeststr);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

			$response = curl_exec($ch);

			// We will do some heavy lifting on the server side
			// parse JSON and send back already prepared html with
			// only the elements we have to add to fields
			//
			$response_decoded = json_decode($response, true);
		
			return 	$response_decoded;
	}	
	
	
	
	public function getById($reicpe_id){
			
		// API credentials
		//
		$personsName="jenni";
		$appid = Recipe::getAppidByPerson($personsName);
		$appkey = Recipe::getAppkeyByPerson($personsName);
		
		$requeststr = "http://api.yummly.com/v1/api/recipe/";
		$requeststr = $requeststr.$reicpe_id."?";
		$requeststr = $requeststr."_app_id=".$appid;
		$requeststr = $requeststr."&_app_key=".$appkey;

		$output = $this->getDataFromYummly($requeststr);
	
		return $output;
	}	
	
	
	public function getRecipesByIngList($ings){
			
		// API credentials
		//
		$personsName="jenni";
		$appid =  $this->getAppidByPerson($personsName);
		$appkey = $this->getAppkeyByPerson($personsName);
		
		
		// Building string for GET request
		//
		$requeststr = 'http://api.yummly.com/v1/api/recipes?requirePictures=true&';
		$requeststr = $requeststr.'_app_id='.$appid;
		$requeststr = $requeststr.'&_app_key='.$appkey;
		$requeststr = $requeststr.'&q='.$ings;


		$output = Recipe::getDataFromYummly($requeststr);
	
		return $output;
	}	
	
		
	public function getRecipesByCourse($course){
			
		// API credentials
		//
		$personsName="jenni";
		$appid =  $this->getAppidByPerson($personsName);
		$appkey = $this->getAppkeyByPerson($personsName);
		
		// Building string for GET request
		//
		$requeststr = 'http://api.yummly.com/v1/api/recipes?requirePictures=true&_app_id='.$appid.'&_app_key='.$appkey.'&allowedCourse[]=course^course-'.$course.'&maxResult=140';

		$output =  $this->getDataFromYummly($requeststr);
	
		return $output;
	}	

	
	
	public function getRecipesByCuisine($cuisine){
		
		// API credentials
		//
		$personsName="jenni";
		$appid =  $this->getAppidByPerson($personsName);
		$appkey = $this->getAppkeyByPerson($personsName);
		
		// Building string for GET request
		$requeststr = 'http://api.yummly.com/v1/api/recipes?requirePictures=true&_app_id='.$appid.'&_app_key='.$appkey.'&allowedCuisine[]=cuisine^cuisine-'.$cuisine.'&maxResult=140';
		Debugger::dump($requeststr);
		$output =  $this->getDataFromYummly($requeststr);
	
		return $output;
	}	
	

	
}
