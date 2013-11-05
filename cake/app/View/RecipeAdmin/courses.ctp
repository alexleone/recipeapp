<h2>Recipes</h2>


	<?php  
	
	print "<pre>";
	print_r($recipe);
	print "</pre>";
	
		// display recipes
		foreach($recipe['matches'] as $r) {
	?>
	
	<a href="/recipeapp/cake/RecipeAdmin/detail/<?php echo $r['id']; ?>">
	<!-- <?php echo $this->Html->link(
		'Recipe', array('controller' => 'Recipe', 'action' => 'index', $recipe["id"]));?> -->
		
	<div class="listingBoxSmall">
		<img class="thumbSmall" src="<?php echo $r['imageUrlsBySize']['90']; ?>" alt="<?php echo $r['recipeName']; ?>" />
		<h3><?php echo $r['recipeName']; ?> - <?php print $r['sourceDisplayName']; ?></h3>
	</div>
	</a>
	<?php 	
		} // end for loop 
	?>


