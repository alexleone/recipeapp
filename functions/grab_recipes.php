<?php
//get the data from the json file
$str_file_info = file_get_contents("recipes.json");
//decode json into array of objects
$object_array_file_info = json_decode($str_file_info);
//just get the array of recipes 
$arry_of_objects_recipes = $object_array_file_info->recipes;
//loop through the array of objects to find data in each
foreach($arry_of_objects_recipes as $recipe) {
	print $recipe->recipeName."<br>";
	print $recipe->id."<br>";
	print $recipe->rating."<br>";
	getYummlyData($recipe->id);
}
function getYummlyData($reicpe_id){

	
	///////////////////////////////////////
	// SETUP //////////////////////////////
	///////////////////////////////////////

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


// 
// 
// 		    $returnstring = $returnstring."<li><p><img src='".
// 			$response_decoded['matches'][$i]['smallImageUrls']['0']."' /> ".
// 			$response_decoded['matches'][$i]['recipeName'].", it has ".count($response_decoded['matches'][$i]['ingredients'])." ingridients.</p></li>";
// 	
	print"<pre>";
	print_r($response_decoded);
	print"</pre>";
}

getYummlyData();
?>