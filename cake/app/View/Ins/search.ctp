<?php 
echo "<h2>Searching for <span class=\"bold\">".$ingredient. "</span></h2>";
echo $this->Form->create('Ins', array('action' => 'search', 'type' => 'post'));
print $this->Form->input('ProductSearch', array('value' => $productSearch, 'label' => false, 'div' => 'ins-get-form-text'));
print $this->Form->input('Ingredient', array('type'=>'hidden', 'value' => $ingredient, 'div' => 'ins-get-form-text'));
print $this->Form->input('RecipeID', array('type'=>'hidden', 'value' => $recipeID, 'id' => 'RecipeID', 'div' => 'ins-get-form-text'));
print $this->Form->input('ItemsString', array('type'=>'hidden', 'value' => $itemsString, 'id' => 'Items', 'div' => 'ins-get-form-text'));
print $this->Form->end('Search'); 
print '<hr class="ins-add-hr"/>';
?>


<?php 
$noResults = "Search not found.  Try again.";
if (empty($productSearch) || empty($in)) {
	echo $noResults;
}
else {
	echo $this->Form->create('Ins', array('url' => array('controller' => 'RecipeAdmin', 'action' => 'store'), 'type' => 'post')); ?>
	<table border="1">
	<?php
	$counter=0;
	// multiple item results
	if (array_key_exists('0', $in['Product_Commercial'])) {
	foreach($in['Product_Commercial'] as  $item){
		print '<div class="ins-get-outer">';
		print '<div class="ins-get-box-thumb"><img src="'.$item['ItemImage'].'" /><span class="form-hidden">'.$this->Form->input($counter.'.item_image',array('value'=>$item['ItemImage'])).'</span></div>';
		print '<div class="ins-get-box-text">';
		print  $this->Form->input($counter.'.item_name', array('value' => $item['Itemname'], 'div' => 'ins-get-form-text')).'<br />';
		print  $this->Form->input($counter.'.item_description', array('type'=>'textarea','value' => $item['ItemDescription'],  'div' => 'ins-get-form-text')).'<br />';
		print  $this->Form->input($counter.'.item_category', array('value' =>$item['ItemCategory'], 'div' => 'ins-get-form-text')).'<br />';
		print  $this->Form->input($counter.'.pricing', array('type'=>'text','value'=>$item['Pricing'],'div' => 'ins-get-form-text')).'<br />';
		print '<span class="form-hidden">'.$this->Form->input($counter.'.item_index', array('value'=>$counter)).'</span>';
		print $this->Form->input($counter.'.ingredient', array('type'=>'hidden', 'value' => $ingredient, 'id' => $counter.'.ingredientID', 'div' => 'ins-get-form-text'));
		print $this->Form->input($counter.'.recipeID', array('type'=>'hidden', 'value' => $recipeID, 'id' => $counter.'.recipeID', 'div' => 'ins-get-form-text'));
		print $this->Form->input($counter.'.itemsString', array('type'=>'hidden', 'value' => $itemsString, 'id' => $counter.'.Items', 'div' => 'ins-get-form-text'));
		print '<br/></div>';
		print '<div class="ins-get-checkbox">'.$this->Form->checkbox($counter.'.item_checked').'</div></div>';
		print '<hr class="ins-add-hr"/>';
		$counter++;		
	}
	?>
	</table>	
	<?php  
	}
	// only 1 item result
	else {
		print '<div class="ins-get-outer">';
		print '<div class="ins-get-box-thumb"><img src="'.$in['Product_Commercial']['ItemImage'].'" /><span class="form-hidden">'.$this->Form->input($counter.'.item_image',array('value'=>$in['Product_Commercial']['ItemImage'])).'</span></div>';
		print '<div class="ins-get-box-text">';
		print  $this->Form->input($counter.'.item_name', array('value' => $in['Product_Commercial']['Itemname'], 'div' => 'ins-get-form-text')).'<br />';
		print  $this->Form->input($counter.'.item_description', array('type'=>'textarea','value' => $in['Product_Commercial']['ItemDescription'],  'div' => 'ins-get-form-text')).'<br />';
		print  $this->Form->input($counter.'.item_category', array('value' =>$in['Product_Commercial']['ItemCategory'], 'div' => 'ins-get-form-text')).'<br />';
		print  $this->Form->input($counter.'.pricing', array('type'=>'text','value'=>$in['Product_Commercial']['Pricing'],'div' => 'ins-get-form-text')).'<br />';
		print '<span class="form-hidden">'.$this->Form->input($counter.'.item_index', array('value'=>$counter)).'</span>';
		print $this->Form->input($counter.'.ingredient', array('type'=>'hidden', 'value' => $ingredient, 'div' => 'ins-get-form-text'));
		print $this->Form->input($counter.'.recipeID', array('type'=>'hidden', 'value' => $recipeID, 'id' => 'RecipeID', 'div' => 'ins-get-form-text'));
		print $this->Form->input($counter.'.itemsString', array('type'=>'hidden', 'value' => $itemsString, 'id' => $counter.'.Items', 'div' => 'ins-get-form-text'));
		print '<br/></div>';
		print '<div class="ins-get-checkbox">'.$this->Form->checkbox($counter.'.item_checked').'</div></div>';
		print '<hr class="ins-add-hr"/>';
	?>
	</table>	
	<?php
	} // end else
	//print $this->Form->input('ingredient', array('type'=>'hidden', 'value' => $ingredient, 'id' => 'ingredientID', 'div' => 'ins-get-form-text'));
	//print $this->Form->input('recipeID', array('type'=>'hidden', 'value' => $recipeID, 'id' => 'recipeID', 'div' => 'ins-get-form-text'));
	print $this->Form->end('Store Products'); 
} // end else 
?>

