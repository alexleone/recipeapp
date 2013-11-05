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
		url: '/recipeapp/cake/RecipeAdmin/courses/'+course,
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
		<option>choose one</option>
		<option value="american">American</option>
		<option value="italian">Italian</option>
		<option value="asian">Asian</option>
		<option value="mexican">Mexican</option>
		<option value="southern">Southern & Soul Food</option>
		<option value="french">French</option>
		<option value="southwestern">Southwestern</option>
		<option value="barbecue">Barbecue</option>
		<option value="indian">Indian</option>
		<option value="chinese">Chinese</option>
		<option value="cajun"> Cajun & Creole</option>
		<option value="english">English</option>
		<option value="mediterranean">Mediterranean</option>
		<option value="greek">Greek</option>
		<option value="spanish">Spanish</option>
		<option value="german">German</option>
		<option value="thai">Thai</option>
		<option value="moroccan">Moroccan</option>
		<option value="irish"> Irish</option>
		<option value="japanese">Japanese</option>
		<option value="cuban">Cuban</option>
		<option value="hawaiian">Hawaiian</option>
		<option value="swedish">Swedish</option>
		<option value="hungarian">Hungarian</option>
		<option value="portugese">Portugese</option>
	</select>
	Courses:
	<select onchange="var course = this.options[this.selectedIndex].value; getRecipesByCourse(course)">
		<option>choose one</option>
		<option value="Main%2BDishes">Main Dishes</option>
		<option value="Desserts">Desserts</option>
		<option value="Side%2BDishes">Side Dishes</option>
		<option value="Lunch%2Band%2BSnacks">Lunch and Snacks</option>
		<option value="Appetizers">Appetizers</option>
		<option value="Salads">Salads</option>
		<option value="Breads">Breads</option>
		<option value="Breakfast%2Band%2BSoups">Breakfast and Soups</option>
		<option value="Lunch%2Band%2BSnacks">Lunch and Snacks</option>
		<option value="Beverages">Beverages</option>
		<option value="Condiments%2Band%2BSauces">Condiments and Sauces</option>
		<option value="Cocktail">Cocktail</option>
	</select>
	</form>
</div>
<div id="content">


</div>