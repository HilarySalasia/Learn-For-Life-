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
<?php echo $nav;?>
<?php echo $nav2;?>
</ul>
</div>
<div id="content">
<?php
if(isset($_COOKIE['EmpUser'])){
$projectID=$_GET['id'];
$mainprojsql=mysql_query("SELECT S.* FROM students S join apply_proj A on A.User_ID=S.StdtID where A.Proj_ID='$projectID' ");
if($mainprojsql){}else{mysql_error();}
$num_rows=mysql_num_rows($mainprojsql);
if ($num_rows <=0){echo "No Applicants At This Time";}
while($displayrowsarr=mysql_fetch_array($mainprojsql)){
$StdID=$displayrowsarr['StdtID'] ;
echo "<div id=projectview>
Name:" . "   ". $displayrowsarr['Name'] . "</br>".
"Location:"  ."   ". $displayrowsarr['Location'] . "</br>".
"Skills  :"  ."   ". $displayrowsarr['Skills'] . "</br>".
"Work Experince    :"  ."   ". $displayrowsarr['Workexp'] . "</br>".
"Education Attainment     :" ."   ". $displayrowsarr['Educationatt'] . "</br>";
echo "<form method=post action=../learnforlife/Lucky_Project_winner.php?id=$StdID&P_ID=$projectID />
<input type=submit name=detsbtn value=Select_User />
</form>";
echo "<hr/></div><br/>";

}
}
?>
</div>
<div id="footer">
</div>
</div>
</body>
</html>