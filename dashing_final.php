<!-- Dahboard -->

<?php

	// HTTPS redirect
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
	// Here we are using sessions to propagate the login
	// http://php.net/manual/en/book.session.php
	// http://php.net/manual/en/function.session-start.php
?>
<?php
	session_start();
?>

<!DOCTYPE html>

<html>
<head>
	<title>Dashboard</title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- the script -->
	<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
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
					<a class="navbar-brand" href="index.php">Diana Kander</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="insert.php">Update Business</a></li>
						<li><a href="http://www.dianakander.com/about.html" target="_blank">About</a></li>
						<li><a href="http://www.dianakander.com/contact.html#/" target="_blank">Contact</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>
	<div class="jumbotron">
			<div class="container">
				<h1>Dashboard</h1>
				<p>In here, you can access the info on-the-go and plan ahead.</p>
			</div>
	</div>
		
	<?php
		$link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));

		$business_code = $_SESSION['business_code'];//getting business code from session

		//query definition
		$query1 = ("SELECT fname, lname, job_title, description FROM team_members WHERE business_code = \"$business_code\" order by fname;");				
		$query2 = ("SELECT fname, lname, job_title, description FROM partners WHERE business_code = \"$business_code\" order by fname;");

		$result1 = mysqli_query($link, $query1) or die("" . mysqli_error($link));
		$result2 = mysqli_query($link, $query2) or die("" . mysqli_error($link));
	?>
		<h3 class = "col-sm-3">Team Members:</h3>
		<table class = "table table-striped">
				<thead>
					<tr>
					<th> First Name</th>
					<th> Last Name </th>
					<th> Title    </th>
					<th> Description </th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result1)) 
					 {
			            echo '<tr>';
						//the rows as the real values:
			            foreach($row as $field) 
						{
			                echo '<td>'. $field .'</td>';
			            }
			            echo '</tr>';
			        }
					echo "<br>";
		//free the result at the end.
		mysqli_free_result($result1);
		
	?>
		</tbody>
		</table>
		<br><br>
		
		
		<h3 class = "col-sm-3">Partners:</h3>
		<table class = "table table-striped">
				<thead>
					<tr>
					<th> First Name</th>
					<th> Last Name </th>
					<th> Title    </th>
					<th> Description </th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result2)) 
					 {
			            echo '<tr>';
						//the rows as the real values:
			            foreach($row as $field) 
						{
			                echo '<td>'. $field .'</td>';
			            }
			            echo '</tr>';
			        }
					echo "<br>";
		//free the result at the end.
		mysqli_free_result($result1);
		mysqli_free_result($result2);
		
	?>
		</tbody>
		</table>
		<br><br>
		
		<h3 class="col-md-4">Send a Question to Diana Kander:</h3>
		<div class="container">
		<div class="row">
		<p> <?php echo $feedback; ?> </p> 
		<form action="form-to-email.php" method="POST">
		
			<div class="row form-group">
			<input class='form-control' type="text" name="name" placeholder="name">
			</div>
						
			<div class="row form-group">
			<input class='form-control' type="email" name="email" placeholder="email">
			</div>
						
			<div>
			<label for='message'>Enter Message (PS: you can drag the box below):</label> <br>
			<textarea name="message"></textarea>
			</div>
			
			
			<div class="row form-group">
			<input class=" btn btn-info" type="submit" name="submit" value="submit"/>
			</div>
		</div>
		</div>
		</form>
		<br>
		
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