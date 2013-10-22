<?php echo $this->Form->create('Ins', array('action' => 'add', 'method' => 'POST')); ?>
<table border="1">
<?php
$counter=0;
foreach($in['Product_Commercial'] as  $item){
	print '<div class="ins-get-outer">';
	print '<div class="ins-get-box-thumb"><img src="'.$item['ItemImage'].'" /><span class="form-hidden">'.$this->Form->input($counter.'.item_image',array('value'=>$item['ItemImage'])).'</span></div>';
	print '<div class="ins-get-box-text">';
	print  $this->Form->input($counter.'.item_name', array('value' => $item['Itemname'], 'div' => 'ins-get-form-text')).'<br />';
	print  $this->Form->input($counter.'.item_description', array('type'=>'textarea','value' => $item['ItemDescription'],  'div' => 'ins-get-form-text')).'<br />';
	print  $this->Form->input($counter.'.item_category', array('value' =>$item['ItemCategory'], 'div' => 'ins-get-form-text')).'<br />';
	print  $this->Form->input($counter.'.pricing', array('type'=>'text','value'=>$item['Pricing'],'div' => 'ins-get-form-text')).'<br />';
	print '<span class="form-hidden">'.$this->Form->input($counter.'.item_index', array('value'=>$counter)).'</span>';
	print '<br/></div>';
	print '<div class="ins-get-checkbox">'.$this->Form->checkbox($counter.'.item_checked').'</div></div>';
	print '<hr class="ins-add-hr"/>';
	$counter++;		
}
?>
</table>	
<?php print $this->Form->end('Add Ingredient to DB'); ?>

