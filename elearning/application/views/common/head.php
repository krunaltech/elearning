<html lang="en">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-learning Login</title>
  	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
  	<!-- Optional theme -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/learning_script.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
	    	<div class="navbar-brand">
		      <a href="#">
		        <img alt="Learning Port" src="<?php echo base_url(); ?>images/logo.png"> 
		      </a>Learning Port
	      	</div>
	    </div>
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav navbar-right">
		    <li><a class="btn btn-default navbar-btn" href="<?=site_url('cart')?>">View Cart</a></li>
		    <li>
		    <?php
	      		if($this->session->userdata("customer_type") != null)
	      		{
	      	?>
	      	<a class="btn btn-default navbar-btn" href="<?=site_url('login/logout')?>">Sign Out</a>
	      	<?php
	      		}
	      		else
	      		{
	      	?>
	      	<a href="<?=site_url('Login')?>" class="btn btn-default navbar-btn">Sign in</a>
	      	<?php
	      		}
	      	?>
	      	</li>
	      	
		    </ul>
  		</div>
	  </div>
	</nav>
	<div class="mycontainer">