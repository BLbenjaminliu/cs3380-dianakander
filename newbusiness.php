<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}
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
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://dianakander.cloudapp.net">Diana Kander</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="http://dianakander.cloudapp.net/admin_dashboard.php">Dashboard</a></li>
						<li><a href="http://dianakander.cloudapp.net">Logout</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>
		
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1>Register New Business</h1>
				<p>Enter business information and set a business code.</p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3"></div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="createbusiness">
						<div class="row form-group">
							<label for="name">Business name:</label>
							<input class='form-control' type="text" name="name" placeholder="Name" autofocus>
						</div>
						<div class="row form-group">
							<label for="city">City:</label>
							<input class='form-control' type="text" name="city" placeholder="City">
						</div>
						<div class="row form-group">
							<label for="state">State:</label>
							<input class='form-control' type="text" name="state" placeholder="State">
						</div>
						<div class="row form-group">
							<label for="address">Address:</label>
							<input class='form-control' type="text" name="address" placeholder="Address">
						</div>
						<div class="row form-group">
							<label for="zipcode">Zipcode:</label>
							<input class='form-control' type="text" name="zipcode" placeholder="Zipcode">
						</div>
						<div class="row form-group">
							<label for="phone_number">Phone Number:</label>
							<input class='form-control' type="text" name="phone_number" placeholder="Phone Number">
						</div>
						<div class="row form-group">
							<label for="email">E-mail:</label>
							<input class='form-control' type="text" name="email" placeholder="example@example.com">
						</div>
						<div class="row form-group">
							<label for="description">Description:</label>
							<!--<input class='form-control' type="text" name="description" placeholder="Description">-->
							<textarea form="createbusiness" rows="4" cols="53" name="description" placeholder="Description"></textarea>
						</div>
						<div class="row form-group">
							<label for="business_code">Business Code:</label>
							<input class='form-control' type="text" name="business_code" placeholder="Business Code">
						</div>
						<div class="row form-group">
							<input class=" btn btn-info" type="submit" name="submit" value="Create"/>
						</div>
					</form>
				</div>
			</div>
			<?php
				if(isset($_POST['submit'])) {//was create business pushed
					
					//get intputs and make them variables
					$name = $_POST['name'];
					$city = $_POST['city'];
					$state = $_POST['state'];
					$address = $_POST['address'];
					$zipcode = $_POST['zipcode'];
					$phone_number = $_POST['phone_number'];
					$email = $_POST['email'];
					$description = $_POST['description'];
					$business_code = $_POST['business_code'];

					$query = ("SELECT business_code FROM business WHERE business_code = \"$business_code\"; ");//used to see if business code exists

					$link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					$result = mysqli_query($link, $query) or die("Error in query:" . mysqli_error($link));
					
					$stmt = mysqli_stmt_init($link);
					
					if(mysqli_stmt_prepare($stmt, 'INSERT INTO business(name,city,state,address,zipcode,phone_number,email,description,business_code) VALUES (?,?,?,?,?,?,?,?,?)')) {
						if(mysqli_num_rows($result) == 0){//make sure the business code does not exist
							mysqli_stmt_bind_param($stmt, "sssssssss", $name, $city, $state, $address, $zipcode, $phone_number, $email, $description, $business_code);
								if(mysqli_stmt_execute($stmt)){
									echo "<h4>Your Business Has Been Created!</h4>";
									mysqli_stmt_close($stmt);
								}//end if mysqli stmt execute
								else{
									echo "<h4>An Error Occured</h4>";
								}//end else mysqli stmt execute
						}//end mysqli num rows
							else{
								echo "Business code already exists.";
							}//end else num row
					}//end mysqli stmt prepare
				}//end if isset
			?>
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