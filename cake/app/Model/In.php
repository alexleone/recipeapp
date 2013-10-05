<?php

App::uses('AppModel', 'Model');

class In extends AppModel {
	
	public $name = 'In';

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

		
		return 	$response_in_xml;

	}	
	
}
