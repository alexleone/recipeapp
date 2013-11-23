<?php
//$cakeDescription = __d('cake_dev', 'Easy As Cake, Whole Food\'s Recipe Order');
$cakeDescription = __d('cake_dev', 'Whole Foods Fair Lakes');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo "<!-- bxSlider CSS file -->";
		echo $this->Html->css('jquery.bxslider');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!-- bxSlider Javascript file -->
	<script src="/recipeapp/cake/js/jquery.bxslider.min.js"></script>
	<!-- fonts -->
	<link href='http://fonts.googleapis.com/css?family=Permanent+Marker|Cabin+Sketch:700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 class="left"><?php echo $this->Html->link($cakeDescription, '#'); ?></h1>
			<ul id="nav">
				<li><a href="/recipeapp/cake/Recipes/cuisines/">Cuisines</a></li>
				<li><a href="/recipeapp/cake/Recipes/courses/">Courses</a></li>
			</ul>
		</div>
		<div id="content">
			
			<?php echo $this->Session->flash(); ?>
			
			<?php echo $this->fetch('content'); ?>
		
		</div>
		<div id="footer">
			<?php print 'Whole Foods Fair Lakes' ?>
		</div>
	</div>
	<?php //	echo $this->element('sql_dump'); ?>
</body>
</html>
