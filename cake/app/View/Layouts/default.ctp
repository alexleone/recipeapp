<?php
$cakeDescription = __d('cake_dev', 'Easy As Cake, Whole Food\'s Recipe Order');
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

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, '#'); ?></h1>
		</div>
		<div id="content">
			
			<?php echo $this->Session->flash(); ?>
			
			<?php echo $this->fetch('content'); ?>
		
		</div>
		<div id="footer">
			<?php print 'Whole Foods' ?>
		</div>
	</div>
	<?php //	echo $this->element('sql_dump'); ?>
</body>
</html>
