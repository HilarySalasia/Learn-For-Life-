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
$getservdets=mysql_query("select * from employers where EmpID='$employer_ID'");
$getRowserv=mysql_fetch_assoc($getservdets);
$nameserv=$getRowserv['Name'];
$conatactdetsserv=$getRowserv['Contactdets'];
$descriptionserv=$getRowserv['Description'];

if(isset($_POST['editemplsubmit'])){
$name=$_POST['empname'];
$contactsdets=$_POST['empcontact'];
$description=$_POST['empdesc'];
$sql = mysql_query("UPDATE employers SET Name='$name', Contactdets='$contactsdets', Description='$description' where EmpID='$employer_ID'");

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

<div>Profile:  <?php echo $showname;?></div>
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
<?php 
global $message, $passwrdmatch;
echo $message; ?>
<form method="post" action="">
<center><span class="error"> <?php echo $passwrdmatch; ?></span></center>
Name<br/>
<center><input type="text" name="empname" placeholder="Name" value="<?php echo $nameserv;?>" class="formstyle"><br/></center>
Contacts<br/>
<input type="numbers" name="empcontact" placeholder="Contact Details" value="<?php echo $conatactdetsserv;?>" class="formstyle"><br/></center>
Employer Description<br/>
<center><textarea name="empdesc" placeholder="Employer Description" id="textareas" ><?php echo $descriptionserv;?></textarea><br/>
<input type="submit" name="editemplsubmit"></center>
</form>
</div>
<div id="footer">
</div>
</div>
</body>
</html>