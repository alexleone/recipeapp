<?php
	echo "<h2>Recipe Info Added to Database</h2>";
	
	echo "<h5>Recipe Yummly ID</h5>";
	echo "<p>" .$data['Recipe']['rec_name']. "</p>";
	
	echo "<h5>Recipe rating</h5>";
	echo "<p>" .$data['Recipe']['rating']. "</p>";
	
	echo "<h5>Ingredients</h5>";
	echo "<p>";
	for ($i=0; $i < count($data['Ins']); $i++) {
		echo $data['Ins'][$i]['in_name']. "<br />";
	}
	echo "</p>";
	
	echo "<h5>Courses</h5><p>";
	for ($i=0; $i < count($data['Courses']); $i++) {
		echo $data['Courses'][$i]['type']. "<br />";
	}
	echo "</p>";
	
	echo "<h5>Cuisines</h5><p>";
	for ($i=0; $i < count($data['Cuisines']); $i++) {
		echo $data['Cuisines'][$i]['type']. "<br />";
	}
	echo "</p>";
	
	echo "<a href=\"../RecipeAdmin\">Search for more Recipes</a>";
?>