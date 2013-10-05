<?php

App::uses('Ingredients', 'AppModel');


class IndgredientModel extends AppModel {


	public function getItem($item){
		// API credentials
		//
		$appid = "fa6a47f80f";
		$storeid = "698ea63147";

		// Building string for GET request
		//
		$requeststr = "http://www.SupermarketAPI.com/api.asmx/COMMERCIAL_SearchForItem?";
		$requeststr = $requeststr."APIKEY=".$appid;
		$requeststr = $requeststr."&StoreId=".$storeid;&
		$requeststr = $requeststr."ItemName=".$item;

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
		$response_in_xml = simplexml_load_file($response);
		
		return 	$response_in_xml;

	}	
	
}
