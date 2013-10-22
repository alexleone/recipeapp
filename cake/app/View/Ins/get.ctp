<table border="1">
<?php
$counter=0;
foreach($in['Product_Commercial'] as  $item){
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
			$counter++;
		
			
			print '</tr>';		
		
	}
	print '<tr><td colspan="8">'.$this->Form->end('Add Ingredient to DB').'</td></tr>';
?>
</table>	



