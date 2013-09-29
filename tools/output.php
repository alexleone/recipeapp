<?php
$ap_id= "8b7fc356";
$app_id="3d0f6c532b8db2f84758d901d7129167";


for($i=1; $i<8; $i++){
	$ing_array[$i] = ereg_replace(' ', '', $_POST['ingredients'.$i]);
}

$ings="";
foreach($ing_array as $ing){
	$ings.=$ing."+";
}
	
$api_url='http://api.yummly.com/v1/api/recipes?requirePictures=true&_app_id='.$ap_id.'&_app_key='.$app_id.'&q='.$ings.'';
$content = file_get_contents($api_url);
$json= json_decode($content, true);

// foreach($json['matches'] as $recipe){
// print "".$recipe[''];
// print "".$recipe[''];
// 
// }

?>
<pre>
<?php
print_r($json);
?>
</pre>