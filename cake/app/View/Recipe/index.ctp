 
hello
<pre>
<?php
<<<<<<< HEAD
	print_r($recipe);
?>



<div id="Content">

	<?php  
		// display recipe
		if(!empty($recipe) && isset($recipe)) {
	?>
		
	<div class='recipeBox'>
		<img class="thumb" src="<?php echo $recipe["images"]["0"]["hostedLargeUrl"]; ?>" alt="<?php echo $recipe["name"]; ?>" />
		<h3><?php echo $recipe["name"]; ?> - <a id='Logo' href="<?php echo $recipe["source"]["sourceRecipeUrl"]; ?>" target="_blank"> <?php echo $recipe["source"]["sourceDisplayName"]; ?></a></h3>
		<h5>Servings: <?php echo $recipe["yield"]; ?></h5>
		<h5>Ingredients:</h5>
		<ul>
			<?php  foreach($recipe["ingredientLines"] as $ingredient) {?>
			<li><?php echo $ingredient; ?></li>
			<?php } ?>
		</ul>
	</div>
	<?php 	
		} // end if
	?>
</div>
=======
print_r($recipe);
$recipe['flavors']['Meaty'];
?>
</pre>
>>>>>>> a012579e9cedf1152df68ab199de36d4f3e88c73
