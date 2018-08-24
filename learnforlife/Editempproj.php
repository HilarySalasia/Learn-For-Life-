<?php
include 'serverdets.php';
if (isset($_COOKIE['EmpUser'])){
$nav= "<li><a href=../learnforlife/employerproj.php>Enter Projects</a></li>";
$nav2= "<li><a href=../learnforlife/editempdets.php>Edit Employer Details</a></li>";
$nav3= "<li><a href=../learnforlife/showmyprojects.php>Show my Projects</a></li>";
$employer_ID= $_COOKIE['EmpUser'];
$prof_name_sql=mysql_query("SELECT Name FROM employers WHERE EmpID='$employer_ID'");
	while($prof_name= mysql_fetch_array($prof_name_sql)){
	$showname=$prof_name['Name'];
	
	}
}elseif(isset($_COOKIE['StdUser'])){
$Student_ID= $_COOKIE['StdUser'];

$prof_name_sql1=mysql_query("SELECT * FROM students WHERE StdtID='$Student_ID'");
while($prof_name1= mysql_fetch_array($prof_name_sql1)){
$showname=$prof_name1['Name'];
echo $showname1;
}
$nav2=" ";
$nav3=" ";
$nav="<li><a href=../learnforlife/editstudentdet.php>Edit Your Details</a></li> ";
}else{$nav2=" ";
$nav3=" ";
$nav=" ";
}

if (isset($_COOKIE['EmpUser'])){
$Proj_ID=$_GET['id'];

$selectempprojsql=mysql_query("select * from employer_proj where Proj_ID='$Proj_ID'");
$rowempproj=mysql_fetch_assoc($selectempprojsql);
$projttlerow=$rowempproj['Proj_Title'];
$emprojdescrow=$rowempproj['Proj_Desc'];
$needskillrow=$rowempproj['Needed_skill'];
$paymentrow=$rowempproj['Payment'];
$startdaterow=$rowempproj['Start_Date'];
$enddaterow=$rowempproj['End_Date'];
$descriptionrow=$rowempproj['Description'];

if(isset($_POST['empprojsubmit'])){
global $cookiempid;
$projtitle=$_POST['projtitle'];
$projdesc=$_POST['Projdesc'];
$needskill=$_POST['needskill'];
$payment=$_POST['projpayment'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$description=$_POST['description'];
$cookie=$_COOKIE['EmpUser'];

$sql = mysql_query("UPDATE employer_proj SET Proj_Title='$projtitle', Proj_Desc='$projdesc', Needed_Skill='$needskill', 
								Payment='$payment', Start_Date='$startdate', End_Date='$enddate', Description='$description' where Proj_ID='$Proj_ID'");
header("Location: index.php");

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
<?php echo $nav;?>
<?php echo $nav2;?>
</ul>
</div>
<div id="content">
<form method="post" action="">
<?php 
global $message, $passwrdmatch;
echo $message; ?>
<center>
<span class="error"> <?php echo $passwrdmatch; ?></span>
<span id="label">Project Title</span><br/>
<input type="text" name="projtitle" placeholder="Project Title" value="<?php echo $projttlerow;?>"class="formstyle" required><br/>
<span id="label">Payment</span><br/>
<input type="text" name="projpayment" placeholder="Payment" value="<?php echo $paymentrow;?>" class="formstyle" required><br/>
<span id="label">Needed Skills</span><br/>
<input type="text" name="needskill" placeholder="Needed Skills" value="<?php echo $needskillrow;?>" class="formstyle" required><br/>
<span id="label">Project Description</span><br/>
<textarea name="Projdesc" placeholder="Project Description" id="textareas" required><?php echo $emprojdescrow;?></textarea><br/>
<span id="label">Description</span><br/>
<textarea name="description" placeholder="Description" id="textareas" required><?php echo $descriptionrow;?></textarea><br/></center>
<span id="label">Start Date</span><br/>
<input type="date" name="startdate" placeholder="Start Date" value="<?php echo $startdaterow;?>"class="formstyle" required><br/>
<span id="label">End Date</span><br/>
<center>
<input type="date" name="enddate" placeholder="End Date" value="<?php echo $enddaterow;?>"class="formstyle" required><br/>
<input type="submit" name="empprojsubmit">
</center>
</form>
</div>
<div id="footer">
</div>
</div>

</body>
</html>