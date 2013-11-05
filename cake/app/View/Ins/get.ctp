<table border="1">
<?php
$counter=0;
foreach($in['Product_Commercial'] as  $item){
<<<<<<< HEAD
<<<<<<< HEAD
			print '<tr>';
			echo $this->Form->create('Ins', array('action' => 'add', 'method' => 'POST'));
			$name =array('value' => $item['Itemname']);
			$description  =array('value' => $item['ItemDescription']);
			$category  =array( 'value' =>$item['ItemCategory']);
			$itemid  =array(  'value' => $item['ItemID']);
			$imgeurl =array( 'value' =>$item['ItemImage']);
			$price  =array( 'value' =>$item['Pricing']);
			$index  =array( 'value' =>$counter);

			print  '<td>'.$this->Form->input('item_name'.$counter, $name).'</td>';
			print  '<td>'.$this->Form->input('item_description'.$counter,$description ).'</td>';
			print  '<td>'.$this->Form->input('item_category'.$counter,$category).'</td>';
			print  '<td>'.$this->Form->input('item_id'.$counter,$itemid).'</td>';
			print  '<td>'.$this->Form->input('pricing'.$counter,$price).'<img src="'.$item['ItemImage'].'" />'.'</td>';
			print  '<td>'.$this->Form->input('item_image'.$counter,$imgeurl).'<img src="'.$item['ItemImage'].'" />'.'</td>';
			print  '<td>'.$this->Form->input('item_index'.$counter,$index).'</td>';
			print  '<td>'.$this->Form->end('Add Ingredient to DB').'</td>';
=======
			print '<tr>';			
			print  '<td>'.$this->Form->input($counter.'.item_name', array('value' => $item['Itemname'])).'</td>';
			print  '<td>'.$this->Form->input($counter.'.item_description', array('type'=>'textarea','value' => $item['ItemDescription'])).'</td>';
			print  '<td>'.$this->Form->input($counter.'.item_category', array('value' =>$item['ItemCategory'])).'</td>';
			print  '<td>'.$this->Form->input($counter.'.item_id', array('type'=>'text','value'=>$item['ItemID'])).'</td>';
			print  '<td>'.$this->Form->input($counter.'.pricing', array('type'=>'text','value'=>$item['Pricing'])).'</td>';
			print  '<td>'.$this->Form->input($counter.'.item_image',array('value'=>$item['ItemImage'])).'<img src="'.$item['ItemImage'].'" />'.'</td>';
			print  '<td>'.$this->Form->input($counter.'.item_index', array('value'=>$counter)).'</td>';
			print '<td>'.$this->Form->checkbox($counter.'.item_checked').'</td>';
			
>>>>>>> develop
			$counter++;
		
			
			print '</tr>';		
		
	}
	print '<tr><td colspan="8">'.$this->Form->end('Add Ingredient to DB').'</td></tr>';
?>
</table>	


=======
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
>>>>>>> 635939f887a3be5e5d58c1eb6cbffb360c578e8f

