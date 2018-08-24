<?php
if(isset($_POST['empprojsubmit'])){
if (isset($_COOKIE['EmpUser'])){
include 'serverdets.php';

global $cookiempid;
$projtitle=$_POST['projtitle'];
$eprojdesc=$_POST['Projdesc'];
$needskill=$_POST['needskill'];
$payment=$_POST['projpayment'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$description=$_POST['description'];
$cookie=$_COOKIE['EmpUser'];

$inssql = mysql_query("INSERT INTO employer_proj (Proj_Title, Proj_Desc, Needed_Skill, Payment, Start_Date, End_Date, Description, User_ID, Proj_Vetting)
VALUES ('$projtitle','$eprojdesc', '$needskill', '$payment', '$startdate', '$enddate', '$description', '$cookie', '0')");
if($inssql){
$message="Successfully Added project";
header("Location:index.php");
}else{echo mysql_error();}
}else{$message="Please Login";}
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="learn.css">
<title>Learn For Life Academy</title>
</head>
<body>
<div class="wrap">
<div id="header">
<center><h1>Learn For Life Academy</h1></center>
</div>
<div id="nav">
<ul>
<li><a href="../learnforlife/login.php">Login</a></li>
<li><a href="../learnforlife/">Home</a></li>
<li><a href="">About</a></li>
<li><a href="../learnforlife/signup.php">Sign up</a></li>

</ul>
</div>
<div id="content">
<form method="post" action="">
<?php 
global $message, $passwrdmatch;
echo $message; ?>
<center>
<span class="error"> <?php echo $passwrdmatch; ?></span>
<input type="text" name="projtitle" placeholder="Project Title" class="formstyle" required><br/>
<input type="text" name="projpayment" placeholder="Payment" class="formstyle" required><br/>
<input type="text" name="needskill" placeholder="Needed Skills" class="formstyle" required><br/>
<textarea name="Projdesc" placeholder="Project Description" id="textareas" required></textarea><br/>
<textarea name="description" placeholder="Description" id="textareas" required></textarea><br/></center>
Start Date<br/>
<input type="date" name="startdate" placeholder="Start Date" class="formstyle" required><br/>
End Date<br/>
<center>
<input type="date" name="enddate" placeholder="End Date" class="formstyle" required><br/>
<input type="submit" name="empprojsubmit">
</center>
</form>
</div>
<div id="footer">
</div>
</div>

</body>
</html>