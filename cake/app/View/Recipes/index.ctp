<?php
$cuisine = array(
	'american' => 'American', 
	'italian' => 'Italian', 
	'asian' => 'Asian',
	'mexican' => 'Mexican',
	'southern' => 'Southern & Soul Food',
	'french' => 'French',
	'southwestern' => 'Southwestern',
	'barbecue' => 'Barbecue',
	'indian' => 'Indian',
	'chinese' => 'Chinese',
	'cajun' => 'Cajun & Creole',
	'english' => 'English',
	'mediterranean' => 'Mediterranean',
	'greek' => 'Greek',
	'spanish' => 'Spanish',
	'german' => 'German',
	'thai' => 'Thai',
	'moroccan' => 'Moroccan',
	'irish' => 'Irish',
	'japanese' => 'Japanese',
	'cuban' => 'Cuban',
	'hawaiian' => 'Hawaiian',
	'swedish' => 'Swedish',
	'hungarian' => 'Hungarian',
	'portugese' => 'Portugese'
	);
	
$course = array(
	'Main%2BDishes' => 'Main Dishes', 
	'Desserts' => 'Desserts', 
	'Side%2BDishes' => 'Side Dishes',
	'Lunch%2Band%2BSnacks' => 'Lunch and Snacks',
	'Appetizers' => 'Appetizers',
	'Salads' => 'Salads',
	'Breads' => 'Breads',
	'Soups' => 'Soups',
	'Lunch%2Band%2BSnacks' => 'Lunch and Snacks',
	'Beverages' => 'Beverages',
	'Condiments%2Band%2BSauces' => 'Condiments and Sauces',
	'Cocktails' => 'Cocktails'
	);
echo $this->Form->create('Recipe', array('action' => 'index'));
echo $this->Form->input('cuisine', array('options' => $cuisine, 'empty' => '(choose one)', 'onchange' => 'this.form.submit()'));
echo $this->Form->end();

echo $this->Form->create('Recipe', array('action' => 'index'));
echo $this->Form->input('course', array('options' => $course, 'empty' => '(choose one)', 'onchange' => 'this.form.submit()'));
echo $this->Form->end();
?>

<h2>Recipes</h2>

<?php
if ($recipes == false) {
	echo "No recipes found.";
}
else {
	// display recipes
		foreach($results as $recipe) {
	?>
	
	<a href="../Recipe/index/<?php echo $recipe['id']; ?>">
	<!-- <?php echo $this->Html->link(
		'Recipe', array('controller' => 'Recipe', 'action' => 'index', $recipe["id"]));?> -->
		
	<div class="listingBox">
		<img class="thumb" src="<?php echo $recipe['images']['0']['hostedLargeUrl']; ?>" alt="<?php echo $recipe['name']; ?>" />
		<h3><?php echo $recipe['name']; ?> - <?php print $recipe['source']['sourceDisplayName']; ?></h3>
	</div>
	</a>
	<?php 	
		} // end for loop 
}
?>