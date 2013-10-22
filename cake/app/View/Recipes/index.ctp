<h2>Recipes</h2>


	<?php  
		// display recipes
		for($i=0;!empty(${'recipe' . $i});$i++) {
			$recipe = ${'recipe' . $i}
	?>
	
	<a href="../Recipe/index/<?php echo $recipe['id']; ?>">
		
	<div class='listingBox'>
		<img class="thumb" src="<?php echo $recipe['images']['0']['hostedLargeUrl']; ?>" alt="<?php echo $recipe['name']; ?>" />
		<h3><?php echo $recipe['name']; ?> - <?php print $recipe['source']['sourceDisplayName']; ?></h3>
	</div>
	</a>
	<?php 	
		} // end for loop 
	?>


