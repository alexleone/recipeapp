<?php

App::uses('Admin', 'AppModel');


class AdminModel extends AppModel {
	
	var $useTable = false;
    var $_schema = array(
        'item_id'		=>array('type'=>'int', 'length'=>7), 
        'item_name'		=>array('type'=>'string', 'length'=>100), 
        'item_description'	=>array('type'=>'string' 'length'=>150),
        'item_category' =>array('type'=>'string' 'length'=>100),
        'item_image' =>array('type'=>'string' 'length'=>150),
        'pricing' =>array('type'=>'double' 'length'=>10)
        
    );
    
    var $validate = array(
    'item_id' => array(
        'rule'=>array('minLength', 5), 
        'message'=>'Item ID must be 5 digits' ),
    'item_name' => array(
        'rule'=>'minlength' 1, 
        'message'=>'Must have a name' ),
    'item_description' => array(
        'rule'=>array('minLength', 1), 
        'message'=>'Description is required' ),
    'item_category' =>array(
    	'rule'=>array('minLength', 1),
    	'message'=>'Category is required'
    'item_image' =>array(
    	'rule'=>array('minLength', 1),
    	'message'=>'Image is required'
    'pricing' =>array(
    	'rule'=>array('minLength', 1),
    	'message'=>'Price is required')
    
	);

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
