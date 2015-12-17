<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}
?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Diana Kander</title>
		<!--Bootstrap Design-->
		<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="jumbotron.css" rel="stylesheet">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	</head>

	<body>
		<!--Navigation Bar-->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Diana Kander</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="http://www.dianakander.com/about.html" target="_blank">About</a></li>
						<li><a href="http://www.dianakander.com/contact.html#/" target="_blank">Contact</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>

		<!--Main jumbotron for name of the page-->
		<div class="jumbotron">
			<div class="container">
				<h1>Welcome to All in Start Up</h1>
				<p>This is the place to be if you are wanting to start up your own business.</p>
				<p><a class="btn btn-primary btn-lg" href="http://www.dianakander.com" target="_blank" role="button">Learn more &raquo;</a></p>
			</div>
		</div>

		<!--Show users different page options to go to-->
		<div class="container">
			<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-4">
					<h2>Register</h2>
					<p>If you haven't registered yourself, start here.</p>
					<p><a class="btn btn-default" href="register.php" role="button">Register &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>Login</h2>
					<p>To login and view your business details, do so here.</p>
					<p><a class="btn btn-default" href="login.php" role="button">Login &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>About Diana Kander</h2>
					<p>Read more about Diana Kander Here.</p>
					<p><a class="btn btn-default" href="http://www.dianakander.com/about.html" target="_blank" role="button">About &raquo;</a></p>
				</div>
			</div>
			<hr>

			<footer>
				<p>&copy; 2014, Diana Kander, All Rights Reserved</p>
			</footer>
		</div> <!-- /container -->
	</body>
</html>
<!--
Copyright (c) <2015> <Reem Alharbi, Tony Ewen, Benjamin Liu, Benjamin Seah, Michael Tompkins>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"),
to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->