
<h2>Cuisines</h2>

<div id="typeWrapper">
<?php
if ($types == null) {
	echo "Error displaying cuisines.";
}
else {
	// display cuisines
	$num = 0;
	foreach($types as $type) {
?>	
		<div class="cuisItem">
			<a href="../Recipes/results/<?php echo $type['Cuisines']['type']; ?>">
				<img src="<?php echo "data:image/jpg;base64," .base64_encode($type['Cuisines']['image']); ?>" alt="<?php echo $type['Cuisines']['type']; ?>" />
				<div class="textOverlay"><?php echo $type['Cuisines']['type']; ?></div>
			</a>
		</div>
	<?php 	
		$num++;
	} // end for loop 
}
?>
</div>