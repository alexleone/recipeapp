<h2>Recipes</h2>
<?php  
	// display recipes
	$num = 0;
	foreach($recipe['matches'] as $r) {
		$items= "";
		foreach($r['ingredients'] as $item){
			$items .= str_replace(' ', '+', $item)."_";
		}
		$items = substr($items, 0 , -1); // removes ending "-"
		$passed = $r['id'].'/'.$items;
?>
<a href="/recipeapp/cake/RecipeAdmin/detail/<?php echo $passed ?>">	
<div class="listingBoxSmall <?php if ($inDb[$num] == 1) { ?>grayout<?php } ?>">
	<img class="thumbSmall" src="<?php echo $r['imageUrlsBySize']['90']; ?>" alt="<?php echo $r['recipeName']; ?>" />
	<h3><?php echo $r['recipeName']; ?> - <?php print $r['sourceDisplayName']; ?></h3>
</div>
</a>
<?php 	
		$num++;
	} // end for loop 
?>