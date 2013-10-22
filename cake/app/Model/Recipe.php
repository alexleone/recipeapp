<?php

App::uses('Recipe', 'Model');


class Recipe extends AppModel {
 	
 	public $name = 'Recipe';

	public function getAppidByPerson($personsName){
		switch($personsName){
			case 'jenni':
				 $appid = "5554e9c3";
			break;
			case 'drew':
				$appid = "7e0f4b62";
			break;
			case 'alex':
				$appid = "8b7fc356";
			break;
		}
		return $appid;
	}
	
	public function getAppkeyByPerson($personsName){
		switch($personsName){
			case 'jenni':
				$appkey = "76a93afd90d3637f940515fc91fc9e48";
			break;
			case 'drew':
				$appkey = "c156d261799467d1898a71842822bdcf"
			break;
			case 'alex':
				$appkey = "3d0f6c532b8db2f84758d901d7129167";
			break;
		}
		return $appkey;
	}
	
	public function getById($reicpe_id){
			
		// API credentials
		//
		$personsName="alex";
		$appid = getAppidByPerson($personsName);
		$appkey = getAppkeyByPerson($personsName);
		
		$requeststr = "http://api.yummly.com/v1/api/recipe/";
		$requeststr = $requeststr.$reicpe_id."?";
		$requeststr = $requeststr."_app_id=".$appid;
		$requeststr = $requeststr."&_app_key=".$appkey;

		$output = Recipe::getDataFromYummly($requeststr);
	
		return $output;
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
	
	
	public function getRecipesByIngList($ings){
			
		// API credentials
		//
		$personsName="alex";
		$appid = getAppidByPerson($personsName);
		$appkey = getAppkeyByPerson($personsName);
		
		// Building string for GET request
		//
		$requeststr = 'http://api.yummly.com/v1/api/recipes?requirePictures=true&';
		$requeststr = $requeststr.'_app_id='.$appid;
		$requeststr = $requeststr.'&_app_key='.$appkey;
		$requeststr = $requeststr.'&q='.$ings;


		$output = Recipe::getDataFromYummly($requeststr);
	
		return $output;
	}	
	
	public function getRecipesByIngList($ings){
			

		// Building string for GET request
		//
		$requeststr = 'http://api.yummly.com/v1/api/recipes?requirePictures=true&';
		$requeststr = $requeststr.'_app_id='.$appid;
		$requeststr = $requeststr.'&_app_key='.$appkey;
		$requeststr = $requeststr.'&q='.$ings;


		$output = Recipe::getDataFromYummly($requeststr);
	
		return $output;
	}	
	
	
	
}
