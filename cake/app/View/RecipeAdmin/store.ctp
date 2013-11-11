<table>
<tr>
	<th>Product Name</th>
	<th>Price</th>
	<th>Picture</th>
	<th>Description</th>
</tr>
	<?php
	$i=0;
	if (array_key_exists('Ins', $dataPostedToDb)) {
		foreach($dataPostedToDb['Ins']['Products'] as $item){
			print '<tr><td>'.$item['name'].'</td><td>'.$item['price'].'</td><td><img src="data:image/jpg;base64,' . base64_encode($item['image']) .'" /></td><td>'.$item['description'].'</td></tr>';
		}
	}
	else {
		foreach($dataPostedToDb as $item){
			print '<tr><td>'.$item['name'].'</td><td>'.$item['price'].'</td><td><img src="data:image/jpg;base64,' . base64_encode($item['image']) .'" /></td><td>'.$item['description'].'</td></tr>';
		}
	}
	?>
</table>

<?php
echo $this->Form->create(null, array('type' => 'post', 'url' => array('controller' => 'RecipeAdmin', 'action' => 'detail', $recipeID, $itemsString)));
echo $this->Form->end('Back to Recipe'); 
?>