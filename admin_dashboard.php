<!-- Dahboard -->
<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Business Code</title>
	<style type="text/css">
		.centered{margin: auto;}
	</style>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
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
	<div>
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
						<!--<li><a href="update.php">Update</a></li>-->
						<li><a href="admin_bc.php">Check code</a></li>
                                                <li><a href="newbusiness.php">Create Business</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>
	</div>	

	<?php
		if (isset ($_POST['logout'])){
			session_destroy();
			header("Location: login.php");
			//exit;
		}
	?>

	<div class="jumbotron">
			<div class="container">
				<h1>Dashboard</h1>
				<p>In here, you can see all the information about a particular business.</p>
			</div>
	</div>
	
	<div>	
		<h3 class="col-md-11">Please enter a business code to see the full info for that business:</h3>
		<div class="container">
		<div class="row"> 
		<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
		
			<div class="row form-group">
			<input class='form-control' type="text" name='Bcode' placeholder="Enter business code" autofocus/>
			</div>
						
			
			<div class="row form-group">
			<input class=" btn btn-info" type="submit" name="submit" value="Submit"/>
			</div>
		</div>
		</div>
		</form>
		<br>
		
		<?php
				
				//if the user hits the submit button then:
				if(isset($_POST['submit'])) 
				{	session_start();
					//connect to data base and change my info !!!!!!!!!!!!!!
					$link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
					//$b_code = $_POST['Bcode'];		
					
					///please make a session = $b_code and dont forget to start the session !!!
					$_SESSION['business_code'] = $_POST['Bcode'];
					$x = $_SESSION['business_code'];
					
					//change in this query the b_code to session and make sure it works 
					$query = "SELECT business_code FROM business WHERE business_code =". "\"$x\"; ";	
					$result = mysqli_query($link, $query) or die("Error in query:" . mysqli_error($link));
					
					if(mysqli_num_rows($result) == 0)
					{
						printf("<b>Error there is no business with this code: %s</b>\n",$x);
					}
					else //valid business_code entered/already used
					{	echo "<footer>
    							<div class='navbar navbar-inverse navbar-fixed-bottom'>
       									<div class='container'>
            									<div class='navbar-collapse collapse' id='footer-body'>
                									<ul class='nav navbar-nav'>
                										<li><a href='insert.php'>Update plan</a></li>
                										<li><a href='#'>Return to top</a></li>
                									</ul>
                								</div>
                						</div>
                				</div>
                				</footer>
                		";
						//change in this query the b_code to session and make sure it works  !!! CHECK
						//change the state and the address to match the database since its in here stateBRO and AdressBRO CHECK
						$query1 = "select name,description,city,state,address,zipcode,phone_number,email from business WHERE business_code =". "\"$x\"; ";
						
						$query2 = "SELECT username,fname, lname, job_title, description FROM team_members WHERE business_code ="."\"$x\" order by fname; ";
						
						$query3 = "SELECT fname, lname,job_title, description FROM partners where business_code =". "\"$x\"order by fname";
						
						$query4 = "select current_behavior,competitive_advantage from competitive_analysis where business_code =". "\"$x\"; ";
						
						$query5 = "select problem,solution,current_status from opportunity where business_code =". "\"$x\"; ";
						
						$query6 = "select target_market,sustainable_advantage from market where business_code =". "\"$x\"; ";
						
						$query7 = "select what,when_happens from planned_marketing_efforts where business_code =". "\"$x\"; ";
						
						$query8 = "select first_goal, second_goal from sales_marketing where business_code =". "\"$x\"; ";
						
						$query9 = "select what,funding_needed,financial_projections,when_milestone from funding_requested where business_code =". "\"$x\"; ";
						
						//change likely to acquisition_amount CHECK
						$query10 = "select acquisition_amount,exit_strategy from exit_and_amount where business_code =". "\"$x\"; ";
						
						//change exit to exit_plan CHECK
						//i commentet out cuz it doesnt work in my database please remove the comments
						$query11 = "select exit_plan,acquirer,company from comparable_exits where business_code =". "\"$x\"; ";
						
						$query12 = "select rounds,regulatory_issue from additional_rounds where business_code =". "\"$x\"; ";
						
						$result1 = mysqli_query($link, $query1) or die("Error in query1:" . mysqli_error($link));
						$result2 = mysqli_query($link, $query2) or die("Error in query2:" . mysqli_error($link));
						$result3 = mysqli_query($link, $query3) or die("Error in query3:" . mysqli_error($link));
						$result4 = mysqli_query($link, $query4) or die("Error in query4:" . mysqli_error($link));
						$result5 = mysqli_query($link, $query5) or die("Error in query5:" . mysqli_error($link));
						$result6 = mysqli_query($link, $query6) or die("Error in query6:" . mysqli_error($link));
						$result7 = mysqli_query($link, $query7) or die("Error in query7:" . mysqli_error($link));
						$result8 = mysqli_query($link, $query8) or die("Error in query8:" . mysqli_error($link));
						$result9 = mysqli_query($link, $query9) or die("Error in query9:" . mysqli_error($link));
						$result10 = mysqli_query($link, $query10) or die("Error in query10:" . mysqli_error($link));
						$result11 = mysqli_query($link, $query11) or die("Error in query11:" . mysqli_error($link));
						$result12 = mysqli_query($link, $query12) or die("Error in query12:" . mysqli_error($link));
						?>
						<h3 class = "col-sm-3">The Business: 
							<!--<a href="update.php"><input type="button" value="Update" name="update_business" class="btn btn-warning"/></a>-->
						</h3>
						<table class = "table table-striped">
								<thead>
									<tr>
									<th>Name</th>
									<th>Description</th>
									<th>City</th>
									<th>State</th>
									<th>Address</th>
									<th>Zipcode</th>
									<th>Phone_number</th>
									<th>Email</th>
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
								
										?>
							</tbody>
							</table>
							<br>
							
							<h3 class = "col-sm-3">Team Members: 
								<!--<a href="update.php"><input type="button" value="Update" name="update_team_members" class="btn btn-warning"/></a>-->
							</h3>
							<table class = "table table-striped">
							<thead>
								<tr>
								<th> UserName </th>
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
				?>				
				</tbody>
				</table>
				<br>
				
				<h3 class = "col-sm-3">Partners:</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> First Name</th>
					<th> Last Name </th>
					<th> Title </th>
					<th> Description </th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result3)) 
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
			?>	
				
				</tbody>
				</table>
				<br>
				
				<h3 class = "col-sm-3">Competitive Analysis:</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> Current Behavior</th>
					<th> Competitive Advantage </th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result4)) 
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
			?>		
			</tbody>
				</table>
				<br>
				
			<h3 class = "col-sm-3">Opportunity:</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> Problem </th>
					<th> Solution </th>
					<th> Current Status</th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result5)) 
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
			?>		
				</tbody>
				</table>
				<br>
				
			<h3 class = "col-sm-3">Market:</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> Target Market </th>
					<th> Sustainable Advantage</th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result6)) 
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
			?>	
				</tbody>
				</table>
				<br>
				
			<h3 class = "col-sm-3">Planned Marketing Efforts:</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> What</th>
					<th> When</th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result7)) 
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
			?>		

				</tbody>
				</table>
				<br>			
			<h3 class = "col-sm-3">Sales Marketing:</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> First Goal </th>
					<th> Second Goal</th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result8)) 
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
			?>					
			</tbody>
				</table>
				<br>	
			<h3 class = "col-sm-3">Funding Requested:</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> What </th>
					<th> Funding Needed</th>
					<th> Financial Projections</th>
					<th> When Milestone</th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result9)) 
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
			?>				
				</tbody>
				</table>
				<br>
			<h3 class = "col-sm-3">Exit and Amount :</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> Acquisition Amount </th>
					<th> Exit Strategy </th>
					</tr>
				</thead>
				<tbody>
			<?php
				     while($row = mysqli_fetch_assoc($result10)) 
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
			?>			
			</tbody>
				</table>
				<br>
			
			<?php			
			echo "<h3 class = 'col-sm-3'>Comparable Exits :</h3>
				<table class = 'table table-striped'>
				<thead>
					<tr>
					<th> Exit Plan  </th>
					<th> Acquirer  </th>
					<th> Company </th>
					</tr>
				</thead>
				<tbody>";
			?>				
				
			<?php
				     while($row = mysqli_fetch_assoc($result11)) 
					 {
			            echo '<tr>';
						//the rows as the real values:
			            foreach($row as $field) 
						{
			                echo '<td>'. $field .'</td>';
			            }
			            echo '</tr>';
			        }
					echo "<br>
			
				</tbody>
				</table>
				<br>";
			?>

				<h3 class = "col-sm-3">Additional Rounds:</h3>
				<table class = "table table-striped">
				<thead>
					<tr>
					<th> Rounds </th>
					<th>  Regulatory Issue  </th>
					</tr>
				</thead>
				<tbody>

			<?php
				     while($row = mysqli_fetch_assoc($result12)) 
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
			?>
				</tbody>
				</table>
				<br>
	<?php				
					}
					mysqli_free_result($result1);
					mysqli_free_result($result2);
					mysqli_free_result($result3);
					mysqli_free_result($result4);
					mysqli_free_result($result5);
					mysqli_free_result($result6);
					mysqli_free_result($result7);
					mysqli_free_result($result8);
					mysqli_free_result($result9);
					mysqli_free_result($result10);
					mysqli_free_result($result11);
					mysqli_free_result($result12);
				}	
	?>
	<br><br><br>
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