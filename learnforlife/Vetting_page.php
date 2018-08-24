<?php
include 'serverdets.php';
if(isset($_COOKIE['StdUser'])){
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
$proj_ID=$_GET['id'];


$vet_sql=mysql_query("update employer_proj set Proj_Vetting='1' where Proj_ID='$proj_ID'");
if($vet_sql){$message="You have successfully Vetted the Project.";
header("refresh:2;url=index.php");}else{echo mysql_error();}










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
<?php
echo $message;
?>
</div>
<div id="footer">
</div>
</div>
</body>
</html>