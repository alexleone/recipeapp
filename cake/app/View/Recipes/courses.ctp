
<h2>Courses</h2>

<div id="typeWrapper">
<?php
if ($types == null) {
	echo "Error displaying courses.";
}
else {
	// display courses
	$num = 0;
	foreach($types as $type) {
?>
		<div class="couItem">
			<a href="../Recipes/results/<?php echo $type['Courses']['type']; ?>">
				<img src="<?php echo "data:image/jpg;base64," .base64_encode($type['Courses']['image']); ?>" alt="<?php echo $type['Courses']['type']; ?>" />
				<div class="textOverlay"><?php echo $type['Courses']['type']; ?></div>
			</a>
		</div>
	<?php 
		$num++;	
	} // end for loop 
}
?>
</div>