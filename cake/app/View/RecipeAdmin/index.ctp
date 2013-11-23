<h2>Search Recipes by</h2>

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
	'Main+Dishes' => 'Main Dishes', 
	'Desserts' => 'Desserts', 
	'Side+Dishes' => 'Side Dishes',
	'Lunch+and+Snacks' => 'Lunch and Snacks',
	'Appetizers' => 'Appetizers',
	'Salads' => 'Salads',
	'Breads' => 'Breads',
	'Soups' => 'Soups',
	'Beverages' => 'Beverages',
	'Condiments+and+Sauces' => 'Condiments and Sauces',
	'Cocktails' => 'Cocktails'
	);
echo $this->Form->create(null, array('url' => array('controller' => 'RecipeAdmin', 'action' => 'cuisines')));
echo $this->Form->input('cuisine', array('options' => $cuisine, 'empty' => '(choose one)', 'onchange' => 'this.form.submit()'));
echo $this->Form->end();

echo "<h2>or</h2>";

echo $this->Form->create(null, array('url' => array('controller' => 'RecipeAdmin', 'action' => 'courses')));
echo $this->Form->input('course', array('options' => $course, 'empty' => '(choose one)', 'onchange' => 'this.form.submit()'));
echo $this->Form->end();
?>