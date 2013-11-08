<?php 
	echo "<pre>"; 
	print_r($dataPostedToDb);
	//print_r($itemInfo);
	print $ingredient. "<br />" .$recipeID;
	print $itemsString;
	echo "</pre>";
	
	
	echo $this->Form->create(null, array('type' => 'post', 'url' => array('controller' => 'RecipeAdmin', 'action' => 'detail', $recipeID, $itemsString)));
	echo $this->Form->end('Back to Recipe'); 
?>