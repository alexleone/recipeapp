<script>
function getRecipesByCuisine(cuisine){
	$.ajax({
		url: '/recipeapp/cake/RecipeAdmin/cuisines/'+cuisine,
		cache: false,
		type: 'GET',
		dataType: 'HTML',
		success: function (data) {
			alert(data);
			$('#content').html(data);
		}
	});
}
function getRecipesByCourse(course){
	$.ajax({
		url: '/recipeapp/cake/RecipeAdmin/course/'+course,
		cache: false,
		type: 'GET',
		dataType: 'HTML',
		success: function (data) {
			alert(data);
			$('#content').html(data);
		}
	});
}
</script>
<div id="contoller">
	<form>
	Cuisine:
	<select onchange="var cusine = this.options[this.selectedIndex].value; getRecipesByCuisine(cusine)">
		<option value="American">American</option>
		<option value="Italian">Italian</option>
		<option value="Asian">Asian</option>
		<option value="Mexican">Mexican</option>
		<option value="Southern-&-Soul-Food">Southern & Soul Food</option>
		<option value="French">French</option>
		<option value="Southwestern">Southwestern</option>
		<option value="Barbecue">Barbecue</option>
		<option value="Indian">Indian</option>
		<option value="Chinese">Chinese</option>
		<option value="Cajun-&-Creole"> Cajun & Creole</option>
		<option value="English">English</option>
		<option value="Mediterranean">Mediterranean</option>
		<option value="Greek">Greek</option>
		<option value="Spanish">Spanish</option>
		<option value="German">German</option>
		<option value="Thai">Thai</option>
		<option value="Moroccan">Moroccan</option>
		<option value="Irish"> Irish</option>
		<option value="Japanese">Japanese</option>
		<option value="Cuban">Cuban</option>
		<option value="Hawaiin">Hawaiin</option>
		<option value="Swedish">Swedish</option>
		<option value="Hungarian">Hungarian</option>
		<option value="Portugese">Portugese</option>
	</select>
	Courses:
	<select onchange="var course = this.options[this.selectedIndex].value; getRecipesByCourse(course)">
		<option value="Main-Dishes">Main Dishes</option>
		<option value="Desserts">Desserts</option>
		<option value="Side-Dishes">Side Dishes</option>
		<option value="Lunch-and-Snacks">Lunch and Snacks</option>
		<option value="Appetizers">Appetizers</option>
		<option value="Salads">Salads</option>
		<option value="Breads">Breads</option>
		<option value="Breakfast-and-Soups">Breakfast and Soups</option>
		<option value="Lunch-and-Snacks">Lunch and Snacks</option>
		<option value="Beverages">Beverages</option>
		<option value="Condiments-and-Sauces">Condiments and Sauces</option>
		<option value="Cocktail">Cocktail</option>
	</select>
	</form>
</div>
<div id="content">


</div>