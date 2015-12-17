<?php
	//start the session
	session_start();

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

		<title>Login</title>
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
		<script>
			function admin_popup(){ //allows a popup to redirect an admin
				if (confirm("Welcome Admin! Click OK to continue.") == true){
					window.location.assign("admin_dashboard.php")
				}
				else{
					window.location.assign("logout.php")
				}
			}
			function normal_user_popup(){//allows a popup to redirect a normal user
				if (confirm("Welcome User! Click OK to continue.") == true){
					window.location.assign("dashing_final.php")
				}
				else{
					window.location.assign("logout.php")
				}
			}
		</script>
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
					<a class="navbar-brand" href="index.php">Diana Kander</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="login.php">Login</a></li>
						<li><a href="http://www.dianakander.com/about.html" target="_blank">About</a></li>
						<li><a href="http://www.dianakander.com/contact.html#/" target="_blank">Contact</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>

		<!--Main jumbotron for name of the page-->
		<div class="jumbotron">
			<div class="container">
				<h1>Login Here</h1>
				<p>To view your business and your business plan please login here, but only if you have registered.</p>
				<a href="register.php" display="inline"><button class="btn btn-warning">Register</button> here if you have not already</a>
			</div>
		</div>

		<!--Login Form-->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3"></div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<div class="row form-group">
							<label for="username">Username:</label>
							<input class='form-control' type="text" name="username" placeholder="Username" autofocus>
						</div>
						<div class="row form-group">
							<label for="password">Password:</label>
							<input class='form-control' type="password" name="password" placeholder="Password">
						</div>
						<div class="row form-group">
							<input type="submit" name="submit" formmethod="post" class="btn btn-info" value="Login"> <!-- deleted formaction-->
						</div>
					</form>
				</div>
			</div>

			<!--Process the Login Form Information-->
			<?php
				if(isset($_POST['submit'])) { // Was the login button pressed??
					//EVENTUALLY NEEDS TO GO IN SECURE FILE
					$link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					//need to hash password here
					$user = $_POST['username'];
					$query = ("SELECT salt, pw_hash FROM team_members WHERE username = \"$user\" ;");	//changed hashed pasword to pw hash and user to team members
					$query2 = ("SELECT business_code FROM team_members WHERE username = \"$user\" ;");//added, my attempt at getting the b code
					$result = mysqli_query($link, $query) or die("Error in query:" . mysqli_error($link));
					$result2 = mysqli_query($link, $query2) or die("Error in query:" . mysqli_error($link));
					$row2 = mysqli_fetch_assoc($result2);
					$_SESSION["business_code"] = $row2["business_code"];

					if(mysqli_num_rows($result) == 0){
						echo "<br>You have not been registered in the system. Please click on the register link above to register.";
					}
					else{
						$row = mysqli_fetch_assoc($result);
						if(password_verify($_POST["password"],$row["pw_hash"])){//changed hashed password to pw hash
							mysqli_free_result($result);
							if($_SESSION["business_code"] == admin){
								echo '<script type="text/javascript"> admin_popup(); </script>';//Popup window to direct you to the next page.
							}
							else{
								echo '<script type="text/javascript"> normal_user_popup(); </script>';//Popup window to direct you to the next page.
							}
						}
						else{
							echo "Username or Password is incorrect";
							echo "<br><br>";
							echo "If you think you are registered then click the register link.";
						}
					} //end else biz actually found
				} //end if submitted button
			?>
			<hr>
		</div> <!-- /container -->
		<div class="container">
			<footer>
				<p>&copy; 2014, Diana Kander, All Rights Reserved</p>
			</footer>
		</div>
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