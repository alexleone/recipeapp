<?php

App::uses('Ins', 'Model');

class Ins extends AppModel {
	
	public $name = 'Ins';
	
	public function getItem($item){
		// API credentials
		//
		$appid = "fa6a47f80f";
		$storeid = "698ea63147";

		$requeststr = "http://www.SupermarketAPI.com/api.asmx/COMMERCIAL_SearchForItem?";
		$requeststr = $requeststr."APIKEY=".$appid;
		$requeststr = $requeststr."&StoreId=".$storeid;
		$requeststr = $requeststr."&ItemName=".$item;

		$response_in_xml = simplexml_load_file($requeststr);

		$json = json_encode($response_in_xml);
		$array = json_decode($json,TRUE);
		
		return 	$array;

	}	
	
}
