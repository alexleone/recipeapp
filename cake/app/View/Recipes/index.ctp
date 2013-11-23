<script>
$(document).ready(function(){
  $('.bxslider').bxSlider({
  	auto: true,
  	autoControls: false,
  	pause: 5000,
  	preloadImages: 'all',
  	autoHover: true,
  	slideWidth: 5000,
  	minSlides: 2,
  	maxSlides: 2,
  	moveSlides: 2,
  	slideMargin: 20
  });
});
</script>

<!-- start slider -->
<div class="bxslider">
<!-- first -->
	<div class="slide">
		<div class="slide-img">
			<img src="/recipeapp/cake/img/groceries-delivered.jpg" />
		</div>
	</div>
	<div class="slide">
		<div class="slide-text">
			<h2>Groceries Delivered</h2>
			<p>Don’t like the big crowds when shopping at Whole Foods? Don’t worry, we’ve got you covered! Browse our selection of recipes and have your groceries delivered right to your house!</p>
		</div>
	</div>
<!-- second -->
	<div class="slide">
		<div class="slide-img">
			<img src="/recipeapp/cake/img/meals.jpg" />
		</div>
	</div>
	<div class="slide">
		<div class="slide-text">
			<h2>Shop by Recipes</h2>
			<p>With categorizations of recipes, finding the right meal for you and your family has never been easier!</p>
		</div>
	</div>
<!-- third -->
	<div class="slide">
		<div class="slide-img">
			<img src="/recipeapp/cake/img/grocery-shopping.jpg" />
		</div>
	</div>
	<div class="slide">
		<div class="slide-text">
			<h2>In-Store Pickup</h2>
			<p>Don’t want your groceries delivered? Not a problem! We also offer in-store pickup guaranteeing your trip to Whole Foods fits into your busy schedule.</p>
		</div>
	</div>
<!-- fourth -->
	<div class="slide">
		<div class="slide-img">
			<img src="/recipeapp/cake/img/family-cooking.jpg" />
		</div>
	</div>
	<div class="slide">
		<div class="slide-text">
			<h2>Pick & Choose</h2>
			<p>Already have some of the ingredients? With our intuitive system, you can pick and choose which products you would like to put in your cart!</p>
		</div>
	</div>
</div>
<!-- end slider -->

<!-- start courses -->
<h2 class="clear">Courses</h2>
<div id="couWrapper">
	<?php 
	foreach ($courses as $course) {
	?>
		<div class="couItem">
			<a href="../results/<?php echo $course['Courses']['type']; ?>">
				<img src="<?php echo "data:image/jpg;base64," .base64_encode($course['Courses']['image']); ?>" alt="<?php echo $course['Courses']['type']; ?>" />
				<div class="textOverlay"><?php echo $course['Courses']['type']; ?></div>
			</a>
		</div>
	<?php
	}
	 ?>
	<div class="couItem"><a href="../Recipes/courses"><div class="textOverlay">view more</div></a></div>
</div>
<!-- end courses -->

<!-- start cuisines -->
<h2 class="clear paddingTop">Cuisines</h2>
<div id="cuisWrapper">
	<?php
	foreach ($cuisines as $cuisine) {
	?>
		<div class="cuisItem">
			<a href="../results/<?php echo $cuisine['Cuisines']['type']; ?>">
				<img src="<?php echo "data:image/jpg;base64," .base64_encode($cuisine['Cuisines']['image']); ?>" alt="<?php echo $cuisine['Cuisines']['type']; ?>" />
				<div class="textOverlay"><?php echo $cuisine['Cuisines']['type']; ?></div>
			</a>
		</div>
	<?php
	}
	?>
	<div class="cuisItem">
		<a href="../Recipes/cuisines">
			<div class="textOverlay">view more</div>
		</a>
	</div>
</div>
<!-- end cuisines -->