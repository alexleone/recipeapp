<?php

App::uses('Model', 'AppModel');


class Recipe extends AppModel {
 	public $name = 'Recipes';
	
	
	public function getById($reicpe_id){

		// API credentials
		//
		$appid = "8b7fc356";
		$appkey = "3d0f6c532b8db2f84758d901d7129167";

		// Building string for GET request
		//
		$requeststr = "http://api.yummly.com/v1/api/recipe/";
		$requeststr = $requeststr. $reicpe_id . "?";
		$requeststr = $requeststr."_app_id=".$appid;
		$requeststr = $requeststr."&_app_key=".$appkey;

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
	
	
	
	
}
