<h2>Ingredients</h2>
<form action="output.php" method="post">
<?php
for($i=1; $i<8; $i++){
	print $i.'. <input type="text" name="ingredients'.$i.'" id="in'.$i.'"><br/>';
}
?>
<input type="submit" value="Submit">
</form>

