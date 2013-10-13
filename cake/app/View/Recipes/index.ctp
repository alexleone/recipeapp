<h2>Recipes</h2>
<!-- 
<pre>
<?php
print_r($recipe0);
print_r($recipe2);
print_r($recipe3);
print_r($recipe4);
print_r($recipe5);
?>
</pre>
 -->
<!-- 
<?php
print $recipe0["flavors"]["Bitter"];
?>
 -->


<div id="Content">

	<?php  
		// display recipes
		for($i=0;!empty(${'recipe' . $i});$i++) {
			$recipe = ${'recipe' . $i}
	?>
		
	<div class='listingBox'>
		<img class="thumb" src="<?php echo $recipe["images"]["0"]["hostedLargeUrl"]; ?>" alt="<?php echo $recipe["name"]; ?>" />
		<h3><?php echo $recipe["name"]; ?> - <a id='Logo' href="<?php echo $recipe["source"]["sourceRecipeUrl"]; ?>" target="_blank"> <?php print $recipe["source"]["sourceDisplayName"]; ?></a></h3>
		<!--
		<h5>Servings: <?php echo $recipe["yield"]; ?></h5>
		<h5>Ingredients:</h5>
		<ul>
			<?php  foreach($recipe["ingredientLines"] as $ingredient) {?>
			<li><?php echo $ingredient; ?></li>
			<?php } ?>
		</ul>
		-->
	</div>
	<?php 	
		} // end for loop 
	?>
</div>

