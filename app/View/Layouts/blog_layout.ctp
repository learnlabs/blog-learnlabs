<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title> Learn Labs | Blog </title>
	    <?php
	    	echo $this->Html->css('normalize.css');
	    	echo $this->Html->css('foundation.css');
	    	echo $this->fetch('meta');
	    	echo $this->fetch('css');
	    ?>
	</head>
	<body>
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1><a><?php echo $this->Html->image('h1.png')?> | Blog </a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
			<section class="top-bar-section">
				<ul class="right">
					<li> <?php echo $this->Html->link('Subscribe',array('controller'=>'posts','action'=>'subscribe')) ?> </li>
					<li> <?php echo $this->Html->link('Login',array('controller'=>'users','action'=>'login')) ?> </li>
					<li> <?php echo $this->Html->link('Register',array('controller'=>'users','action'=>'register')) ?> </li>
				</ul>
			</section>
		</nav>
		<div id="page-wrapper" >
        	<?php echo $content_for_layout; ?>
      	</div>
		<?php
			echo $this->Html->script('vendor/jquery.js');
			echo $this->Html->script('foundation.min.js');
			echo $this->fetch('script');
		?>
		<script>
			$(document).foundation();
    	</script>
	</body>
</html>