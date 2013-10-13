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



	<?php  
		// display recipes
		for($i=0;!empty(${'recipe' . $i});$i++) {
			$recipe = ${'recipe' . $i}
	?>
	
	<!-- <a href="Recipe/index/?id=<?php echo $recipe["id"]; ?>"> -->
	<?php echo $this->Html->link('Recipe', array('controller' => 'Recipe', 'action' => 'index', $recipe["id"]));?>
	<div class='listingBox'>
		<img class="thumb" src="<?php echo $recipe["images"]["0"]["hostedLargeUrl"]; ?>" alt="<?php echo $recipe["name"]; ?>" />
		<h3><?php echo $recipe["name"]; ?> - <?php print $recipe["source"]["sourceDisplayName"]; ?></h3>
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


