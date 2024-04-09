<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
    <?php

	use app\controller\AppController;
	use \fw\core\base\View;
use fw\core\Router;

      View::getMeta();
    ?>	
	<link href="/mvc_2/blog/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="/mvc_2/blog/css/style.css" rel='stylesheet' type='text/css' />

	<?php
		$stylesheets = AppController::$customStylesheets;
		if(!empty($stylesheets)) { 
			foreach($stylesheets as $style) { ?>
				<link href="/mvc_2/public/css/<?php echo $style; ?>" rel='stylesheet' type='text/css' />
	<?php } } ?>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!----webfonts---->
	<link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
	<!----//webfonts---->
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!--end slider -->
	<!--script-->
<script type="text/javascript" src="/mvc_2/blog/js/move-top.js"></script>
<script type="text/javascript" src="/mvc_2/blog/js/easing.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!---->

</head>
<body>
<!---header---->			
<div class="header">  
	 <div class="container">
		  <div class="logo">
			  <a href="/mvc_2/"><img src="/mvc_2/blog/images/logo.jpg" title="" /></a>
		  </div>
			 <!---start-top-nav---->
			 <div class="top-menu">
				 <div class="search">
					 <form>
					 <input type="text" placeholder="" required="">
					 <input type="submit" value=""/>
					 </form>
				 </div>
				  <span class="menu"> </span> 
				   <ul>
						<li><a href="/mvc_2/"><?php __('home')?></a></li>
						<li><a href="/mvc_2/main/about"><?php __('about')?></a></li>
						<li><a href="/mvc_2/main/contact"><?php __('contact')?></a></li>
						<?php if(!isset($_SESSION['user'])): ?>
							<li><a href="/mvc_2/user/login"><?php __('login')?></a></li>
							<li><a href="/mvc_2/user/signup"><?php __('signup')?></a></li>
						<?php else: ?>
							<li><a href="/mvc_2/user/logout"><?php __('logout')?></a></li>
						<?php endif; ?>
                       <div class="clearfix"> </div>
				 </ul>
			 </div>
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
					});
					</script>
				<!---//End-top-nav---->					
	 </div>
</div>
<!--/header-->
<div class="content">
	<div class="container">
		<div class="content-grids">
			<div class="col-md-8 content-main">
				<div class="content-grid">	
                    <!--Start error block-->
                    <div>
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                            </div>  
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                            </div>  
                        <?php endif; ?>
                    </div>
                    <!--End error block-->
                    
                    <!--Start content block-->
                    <?php echo $content; ?>	
                    <!--End content block-->

				</div>
			</div>
			<div class="col-md-4 content-right">
                <?php $this->getPart('inc/sidebar'); ?>	
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!---->
<div class="footer">
	 <div class="container">
	 <p>Copyrights © <?php echo date('Y'); ?> Blog All rights reserved <a href="/mvc_2/">MVC Blog</a></p>
	 </div>
</div>
<script src="/mvc_2/blog/js/main.js"></script>

<?php 
	foreach($scripts as $script) {
		echo $script;
	}

	$customScripts = AppController::$customScripts;
	
	if(!empty($customScripts)){
		foreach($customScripts as $value) { ?>
			<script src="/mvc_2/public/js/<?php echo $value; ?>"></script>
	<?php	} } ?>	
		
    </body>
</html>
	
