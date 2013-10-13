<?php

App::uses('Recipe', 'Model');


class Recipe extends AppModel {
 	
 	public $name = 'Recipe';

	public function getById($reicpe_id){
			
		// API credentials
		//
		// Alex credentials
		$appid = "5554e9c3";
		$appkey = "76a93afd90d3637f940515fc91fc9e48";
	
		
		// Jenni credentials
		// $appid = "5554e9c3";
		// $appkey = "76a93afd90d3637f940515fc91fc9e48";
	
		// Building string for GET request
		//
		
		// Drew credentials
		// $appid = "7e0f4b62";
		// $appkey = "c156d261799467d1898a71842822bdcf"
		//
		
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
		// Alex credentials
		$appid = "5554e9c3";
		$appkey = "76a93afd90d3637f940515fc91fc9e48";
	
		
		// Jenni credentials
		// $appid = "5554e9c3";
		// $appkey = "76a93afd90d3637f940515fc91fc9e48";
	
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
