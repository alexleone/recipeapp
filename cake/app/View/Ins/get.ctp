<table border="1">
<?php
//print_r($in);
$counter=0;
print '';
foreach($in['Product_Commercial'] as  $item){
			print '<tr>';
			echo $this->Form->create('Ins', array('action' => 'add', 'method' => 'POST'));
			$name =array('value' => $item['Itemname']);
			$description  =array('value' => $item['ItemDescription']);
			$category  =array( 'value' =>$item['ItemCategory']);
			$itemid  =array(  'value' => $item['ItemID']);
			$imgeurl =array( 'value' =>$item['ItemImage']);
			$price  =array( 'value' =>$item['Pricing']);
			print $this->Form->input('item_name'.$counter, $name);
			print $this->Form->input('item_description'.$counter,$description );
			print $this->Form->input('item_category'.$counter,$category);
			print $this->Form->input('item_id'.$counter,$itemid);
			print $this->Form->input('item_image'.$counter,$imgeurl);
			print $this->Form->input('pricing'.$counter++,$price);
			print  '<td>'.$item['Itemname'].'</td>';
			print  '<td>'.$item['ItemDescription'].'</td>';
			print  '<td>'.$item['ItemCategory'].'</td>';
			print  '<td>'.$item['ItemID'].'</td>';
			print  '<td>'.$item['ItemImage'].'<img src="'.$item['ItemImage'].'" />'.'</td>';
			print  '<td>'.$item['Pricing'].'</td>';
			echo $this->Form->end('Add Ingredient to DB');
			print '</tr>';		
		
	}
?>
</table>	



