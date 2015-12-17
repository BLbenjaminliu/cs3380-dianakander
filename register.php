<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}
?>
<!DOCTYPE html>

<?php
//start the session
session_start();
?>

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
					<a class="navbar-brand" href="http://dianakander.cloudapp.net">Diana Kander</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="http://dianakander.cloudapp.net">Home</a></li>
						<li><a href="http://dianakander.cloudapp.net/login.php">Login</a></li>
						<li><a href="http://www.dianakander.com/about.html" target="_blank">About</a></li>
						<li><a href="http://www.dianakander.com/contact.html#/" target="_blank">Contact</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>
		
		<!--Main jumbotron for name of the page-->
		<div class="jumbotron">
			<div class="container">
				<h1>Register Here</h1>
				<p>This is the place to be if you are wanting to start up your own business. Please use the Business Code that was provided to you by your team leader or Diana Kander.</p>
			</div>
		</div>

		<!--Registration Form-->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3"></div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<div class="row form-group">
							<label for="username">Username:</label>
							<input class='form-control' type="text" name="username" placeholder="Username">
						</div>
						<div class="row form-group">
							<label for="password">Password:</label>
							<input class='form-control' type="password" name="password" placeholder="Password">
						</div>
						<div class="row form-group">
							<label for="confirm_password">Confirm Password:</label>
							<input class='form-control' type="password" name="confirm_password" placeholder="Confirm Password">
						</div>
						<div class="row form-group">
							<label for="business_code">Business Code:</label>
							<input class='form-control' type="text" name="business_code" placeholder="Business Code">
						</div>
						<div class="row form-group">
							<input class=" btn btn-info" type="submit" name="submit" value="Register"/>
						</div>
					</form>
				</div>
			</div>
			
			<!--Process the Registration Information-->
			<?php
				if(isset($_POST['submit'])) { // Was the register button pressed??
					if($_POST['password'] == $_POST['confirm_password']){

						//EVENTUALLY NEEDS TO GO IN SECURE FILE
						$link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));

						//tony about to do some real work
						$business_code = $_POST['business_code'];
						$query = ("SELECT business_code FROM business WHERE business_code = \"$business_code\" ;");
						$result = mysqli_query($link, $query) or die("Error in query:" . mysqli_error($link));
						$row = mysqli_fetch_assoc($result);
						//echo "the business code found by the query is" . $row["business_code"];
						if(mysqli_num_rows($result) == 0){
							echo "<b>Your business code is invalid. Email Diana Kander for a valid business code.</b>";
						}
						else{
						
						//tony is done doing some real work
						
						$stmt = mysqli_stmt_init($link);
						if(mysqli_stmt_prepare($stmt, 'INSERT INTO team_members(username,salt,pw_hash,business_code) VALUES (?,?,?,?)')) {
							if(ctype_alnum($_POST['username']) && ctype_alnum($_POST['password'])){//only allow characters and numbers to prevent injection
								$username = strtolower($_POST['username']);//make username lowercase
								$salting = [ $salt =>  mt_rand(),];
								$salt = $salting[$salt];


								$pw_hash = password_hash($_POST['password'],PASSWORD_BCRYPT,$salting);
								//$hashed_password = sha1($salt . $_POST['password']);
								//echo "pwhashhhh= " . $pw_hash;								
								mysqli_stmt_bind_param($stmt, "ssss", $username, $salt, $pw_hash, $business_code);
								if(mysqli_stmt_execute($stmt)){
									echo "<h4>Your Account Has Been Created!</h4>";
									echo "<h4><a href='login.php'>Return to login</a></h4>";
									mysqli_stmt_close($stmt);
								}
								else{
									echo "<h4>An Error Occured</h4>";
								}
							}
							else{
								echo "<h4>Only put in Alphanumeric Characters!</h4>";
							}
						}
						else{
							//this MUST change
							die("SUCCESS");
							//die("prepare failed");
						}
						} //end TONY EDIT
					}//end if passwords don't match
				
					else{
						echo "<b>Passwords do not match!</b>";
					}
				}//end submit
				//Close connection
				mysqli_close($link);
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