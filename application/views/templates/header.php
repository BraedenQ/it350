<html>
        <head>
                <title>CodeIgniter Tutorial</title>
                
                <!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
				<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        </head>
        <body>
        <style type="text/css">
        	.navbar .navbar-nav {
			  display: inline-block;
			  float: none;
			  vertical-align: top;
			}

			.navbar .navbar-collapse {
			  text-align: center;
			}
        </style>

        	<nav class="navbar navbar-inverse">
			  	<div class="container-fluid">
			    
				    <div class="navbar-header">
				      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				      	</button>
				    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      		<ul class="nav navbar-nav">
					      	<li><a class="navbar-brand" href="#"><?php echo $title; ?></a></li>
					        <li class=""><a href="#">Link <span class="sr-only">(current)</span></a></li>
					        <li><a href="#">Link</a></li>
					        <li><a href="#">Link</a></li>
					        <li><a><?php
					        if (isset($username)) {
					         	echo "Hello ".$username;
					         } ?></a><li>
			      		</ul>
			      		<ul class="nav navbar-nav navbar-right">
			        		<li><a href="#">Link</a></li>
			      		</ul>
			    	</div><!-- /.navbar-collapse -->
			  	</div><!-- /.container-fluid -->
			</nav>