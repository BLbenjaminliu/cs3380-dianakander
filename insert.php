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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>update</title>
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


		<!--extra bootstrap-->
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
						<li><a href="dashing_final.php">Return to Dashboard</a></li>
						<li><a href="../index.php">Logout</a></li>
						
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>
	</div>

	<br><br><br><br>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>        
    <tr>
        <td>Insert Team Member</td>
        <td><input type="submit" name="ETM" value="Submit"></td>
    </tr>
	<tr>
		<td>First Name</td>
		<td><input type="text" name="first_nameETM" class="form-control"/></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><input type="text" name="last_nameETM" class="form-control"/></td>
	</tr>
	<tr>
		<td>Job Title</td>
		<td><input type="text" name="job_titleETM" class="form-control"/></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><input type="text" name="descriptionETM" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['ETM']))
{
        $bCode= $_SESSION['business_code'] ;
        $first_nameETM= $_POST['first_nameETM'] ;	
        $last_nameETM= $_POST['last_nameETM'] ;
        $job_titleETM= $_POST['job_titleETM'] ;
        $descriptionETM= $_POST['descriptionETM'] ;
		
        $link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO team_members(fname, lname, job_title, description, business_code) VALUES (?,?,?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "sssss", $first_nameETM, $last_nameETM, $job_titleETM, $descriptionETM, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Team Member Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
}//end mysqli stmt prepare
?>
</form>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>
    <tr>
        <td>Insert Partners</td>
        <td><td><input type="submit" name="EP" value="Submit"></td></td>
    </tr>
	<tr>
		<td>First Name</td>
		<td><input type="text" name="first_nameEP" class="form-control"/></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><input type="text" name="last_nameEP" class="form-control"/></td>
	</tr>
    <tr>
		<td>Job Title</td>
		<td><input type="text" name="job_titleEP" class="form-control"/></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><input type="text" name="descriptionEP" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['EP']))
{
        $bCode= $_SESSION['business_code'] ;
        $first_nameEP= $_POST['first_nameEP'] ;	
        $last_nameEP= $_POST['last_nameEP'] ;	
        $job_titleEP= $_POST['job_titleEP'] ;	
        $descriptionEP= $_POST['descriptionEP'] ;
        
        $link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO partners(fname, lname, job_title, description, business_code) VALUES (?,?,?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "sssss", $first_nameEP, $last_nameEP, $job_titleEP, $descriptionEP, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Partner Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
}
?>
</form>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>
    <tr>
        <td>Edit Opportunity</td>
        <td><td><input type="submit" name="EO" value="Submit"></td></td>
    </tr>
	<tr>
		<td>Problem</td>
		<td><input type="text" name="problemEO" class="form-control"/></td>
	</tr>
	<tr>
		<td>Solution</td>
		<td><input type="text" name="solutionEO" class="form-control"/></td>
	</tr>
	<tr>
		<td>Current Status</td>
		<td><input type="text" name="current_statusEO" class="form-control"/></td>
    </tr>
	<tr>
		<td>How Validate 1</td>
		<td><input type="text" name="how_validate1EO" class="form-control"/></td>
	</tr>
	<tr>
		<td>How Validate 2</td>
		<td><input type="text" name="how_validate2EO" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['EO']))
{
        $bCode= $_SESSION['business_code'] ;
        $problemEO= $_POST['problemEO'] ;	
        $solutionEO= $_POST['solutionEO'] ;	
        $current_statusEO= $_POST['current_statusEO'] ;	
        $how_validate1EO= $_POST['how_validate1EO'] ;
        $how_validate2EO= $_POST['how_validate2EO'] ;
		
        $link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO opportunity(problem, solution, current_status, how_validate1, how_validate2, business_code) VALUES (?,?,?,?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "ssssss", $problemEO, $solutionEO, $current_statusEO, $how_validate1EO, $how_validate2EO, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Opportunity Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
}
?>
</form>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>    
    <tr>
        <td>Edit Market</td>
        <td><input type="submit" name="EM" value="Submit"></td>
    </tr>
	<tr>
		<td>Target Market</td>
		<td><input type="text" name="target_marketEM" class="form-control"/></td>
	</tr>
	<tr>
		<td>Sustainable Advantage</td>
		<td><input type="text" name="sustainable_advantageEM" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['EM']))
{
        $bCode= $_SESSION['business_code'] ;
        $target_marketEM= $_POST['target_marketEM'] ;	
        $sustainable_advantageEM= $_POST['sustainable_advantageEM'] ;
		
        $link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO market(target_market, sustainable_advantage, business_code) VALUES (?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "sss", $target_marketEM, $sustainable_advantageEM, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Opportunity Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
}
?>
</form>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>
    <tr>
        <td>Edit Planned Marketing Efforts</td>
        <td><input type="submit" name="EPME" value="Submit"></td>
    </tr>
	<tr>
		<td>What</td>
		<td><input type="text" name="whatEPME" class="form-control"/></td>
	</tr>
	<tr>
		<td>When Happens</td>
		<td><input type="text" name="when_happensEPME" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['EPME']))
{
        $bCode= $_SESSION['business_code'] ;
        $whatEPME= $_POST['whatEPME'] ;	
        $when_happensEPME= $_POST['when_happensEPME'] ;

        $link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO planned_marketing_efforts(what, when_happens, business_code) VALUES (?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "sss", $whatEPME, $when_happensEPME, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Planned Marketing Effort Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
    
}
?>
</form>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>    
    <tr>
        <td>Edit Sales Marketing</td>
        <td><input type="submit" name="ESM" value="Submit"></td>
    </tr>
	<tr>
		<td>First Goal</td>
		<td><input type="text" name="first_goalESM" class="form-control"/></td>
	</tr>
	<tr>
		<td>Second Goal</td>
		<td><input type="text" name="second_goalESM" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['ESM']))
{
        $bCode= $_SESSION['business_code'] ;
        $first_goalESM= $_POST['first_goalESM'] ;	
        $second_goalESM= $_POST['second_goalESM'] ;

        $link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO sales_market(first_goal, second_goal, business_code) VALUES (?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "sss", $first_goalESM, $second_goalESM, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Sales Market Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
		    
}
?>
</form>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>
    <tr>
        <td>Edit Funding Requested</td>
        <td><input type="submit" name="EFR" value="Submit"></td>
    </tr>
	<tr>
		<td>Funding Needed</td>
		<td><input type="text" name="funding_neededEFR" class="form-control"/></td>
	</tr>
	<tr>
		<td>Financial Projections</td>
		<td><input type="text" name="financial_projectionsEFR" class="form-control"/></td>
	</tr>
	<tr>
		<td>When Milestone</td>
		<td><input type="text" name="when_milestoneEFR" class="form-control"/></td>
	</tr>
	<tr>
		<td>What</td>
		<td><input type="text" name="whatEFR" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['EFR']))
{
        $bCode= $_SESSION['business_code'] ;
        $funding_neededEFR= $_POST['funding_neededEFR'] ;	
        $financial_projectionsEFR= $_POST['financial_projectionsEFR'] ;	
        $when_milestoneEFR= $_POST['when_milestoneEFR'] ;	
        $whatEFR= $_POST['whatEFR'] ;	
		
		$link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO funding_requested(funding_needed, financial_projections, when_milestone, what, business_code) VALUES (?,?,?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "sssss", $funding_neededEFR, $financial_projectionsEFR, $when_milestoneEFR, $whatEFR, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Funding Requested Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
    
}
?>
</form>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>
    <tr>
        <td>Edit Exit and Amount</td>
        <td><input type="submit" name="EEAA" value="Submit"></td>
    </tr>
    <tr>
		<td>Acquisition Amount</td>
		<td><input type="text" name="acquisition_amountEEAA" class="form-control"/></td>
	</tr>
    <tr>
		<td>Exit Strategy</td>
		<td><input type="text" name="exit_strategyEEAA" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['EEAA']))
{
        $bCode= $_SESSION['business_code'] ;
        $acquisition_amountEEAA= $_POST['acquisition_amountEEAA'] ;	
        $exit_strategyEEAA= $_POST['exit_strategyEEAA'] ;
		
        $link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO exit_and_amount(acquisition_amount, exit_strategy, business_code) VALUES (?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "sss", $acquisition_amountEEAA, $exit_strategyEEAA, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Exit and Amount Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
    
}
?>
</form>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<table>
    <tr>
        <td>Edit Additional Rounds</td>
        <td><input type="submit" name="EAR" value="Submit"></td>
    </tr>
    <tr>
		<td>Rounds</td>
		<td><input type="text" name="roundsEAR" class="form-control"/></td>
	</tr>
    <tr>
		<td>Regulatory Issue</td>
		<td><input type="text" name="regulatory_issueEAR" class="form-control"/></td>
	</tr>
</table>
<?php
if (isset($_POST['EAR']))
{	   
        $bCode= $_SESSION['business_code'] ;
        $roundsEAR= $_POST['roundsEAR'] ;
        $regulatory_issueEAR= $_POST['regulatory_issueEAR'] ;
    
        $link = mysqli_connect("DBHOST", "DBUSER", "DBPASS", "DBNAME") or die("Connect Error" . mysqli_error($link));
					
		$stmt = mysqli_stmt_init($link);
					
		if(mysqli_stmt_prepare($stmt, 'INSERT INTO additional_rounds(rounds, regulatory_issue, business_code) VALUES (?,?,?)')) {
		//make sure the business code does not exist
            mysqli_stmt_bind_param($stmt, "sss", $roundsEAR, $regulatory_issueEAR, $bCode);
            if(mysqli_stmt_execute($stmt)){
                echo "<h4>Your Addition Rounds Has Been Added!</h4>";
                mysqli_stmt_close($stmt);
            }//end if mysqli stmt execute
            else{
                echo "<h4>An Error Occured</h4>";
            }//end else mysqli stmt execute
        }//end mysqli num rows
}
?>
</form>
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
