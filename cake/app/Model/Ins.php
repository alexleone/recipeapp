<?php

App::uses('Ins', 'Model');

class Ins extends AppModel {

	public $name = 'Ins';
	
	public $primaryKey = 'in_id';
	
	public $hasMany = array(
    'Products' => array(
        'className' => 'Products',
        'foreignKey' => 'in_id',
        'unique' => true,
        'conditions' => '',
        'fields' => '',
        'order' => '',
        'limit' => '',
        'offset' => '',
        'finderQuery' => '',
        'deleteQuery' => '',
        'insertQuery' => ''),
    'RecIns' => array(
    		'className' => 'RecIns',
    		'foreignKey' => 'rec_id',
    		'associationForeignKey' => 'in_id',
    		'with' => 'RecIns'
    ));
    
  //   public $hasAndBelongsToMany = array(
//     'Recipe' => array(
//         'className' => 'Recipe',
//         'joinTable' => 'recins',
//         //'foreignKey' => 'in_id',
//         //'associationForeignKey' => 'rec_id',
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
	
	public function getItem($item){
		
		if ($item == "we got items") {
			return $item;
		}
		else {
		// API credentials
		//
		$appid = "fa6a47f80f";
		// $appid="cf79e45987";
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

}
?>