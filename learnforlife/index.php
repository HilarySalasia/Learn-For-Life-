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

}
$nav2=" ";
$nav3=" ";
$nav="<li><a href=../learnforlife/editstdtdets.php>Edit Your Details</a></li> ";
}else{$nav2=" ";
$nav3=" ";
$nav=" ";
$showname=" ";
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
<form method="post" action="search_results.php">
<input type="text" name="searchtxt" placeholder="Search Project you are looking for" class="formstyle" />
<input type="submit" name="sbmtsearch" value="Search" id="searchbtn"/>
</form>
<?php
if(isset($_COOKIE['administrator'])){
//displays projects to be vetted by the admin.
$mainprojsql=mysql_query("SELECT *  FROM employer_proj where Proj_Vetting='0' ");
if($mainprojsql){}else{mysql_error();}
$num_rows=mysql_num_rows($mainprojsql);
if ($num_rows <=0){echo "No Projects At This Time";}
while($displayrowsarr=mysql_fetch_array($mainprojsql)){
$Proj_ID=$displayrowsarr['Proj_ID'];
echo "<div id=projectview>
Project Title:" . "   ". $displayrowsarr['Proj_Title'] . "</br>".
"Needed Skill:"  ."   ". $displayrowsarr['Needed_skill'] . "</br>".
"Start Date  :"  ."   ". $displayrowsarr['Start_Date'] . "</br>".
"End Date    :"  ."   ". $displayrowsarr['End_Date'] . "</br>".
"Payment     :" ."   ". $displayrowsarr['Payment'] . "</br>";
echo "<form method=post action=../learnforlife/Vetting_page.php?id=$Proj_ID />
<input type=submit name=detsbtn value=Vet />
</form>";
echo "<hr/></div></a>";

}
}
if (isset($_COOKIE['StdUser'])){
//displays projects to students.
$STDID=$_COOKIE['StdUser'];
$studprojsql=mysql_query("SELECT *  FROM employer_proj where Proj_Vetting='1'  ");
if($studprojsql){}else{mysql_error();}
$num_rows=mysql_num_rows($studprojsql);
if ($num_rows < 0){echo "No Projects At This Time";}
while($displayrowsarr=mysql_fetch_array($studprojsql)){
$Proj_ID=$displayrowsarr['Proj_ID'];
echo "<div id=projectview>
Project Title:" . "   ". $displayrowsarr['Proj_Title'] . "</br>".
"Needed Skill:"  ."   ". $displayrowsarr['Needed_skill'] . "</br>".
"Start Date  :"  ."   ". $displayrowsarr['Start_Date'] . "</br>".
"End Date    :"  ."   ". $displayrowsarr['End_Date'] . "</br>".
"Payment     :" ."   ". $displayrowsarr['Payment'] . "</br>";
echo "<form method=post action=../learnforlife/Project_details.php?id=$Proj_ID />
<input type=submit name=detsbtn value=Details />
</form>";
echo "<hr/></div></a>";

}
}
if(isset($_COOKIE['EmpUser'])){
// displays project posted by the user
$Emp_ID=$_COOKIE['EmpUser'];
$mainprojsql=mysql_query("SELECT *  FROM employer_proj where User_ID='$Emp_ID' ");
if($mainprojsql){}else{mysql_error();}
$num_rows=mysql_num_rows($mainprojsql);
if ($num_rows <=0){echo "No Projects At This Time";}
while($displayrowsarr=mysql_fetch_array($mainprojsql)){
$Proj_ID=$displayrowsarr['Proj_ID'];
echo "<div id=projectview>
Project Title:" . "   ". $displayrowsarr['Proj_Title'] . "</br>".
"Needed Skill:"  ."   ". $displayrowsarr['Needed_skill'] . "</br>".
"Start Date  :"  ."   ". $displayrowsarr['Start_Date'] . "</br>".
"End Date    :"  ."   ". $displayrowsarr['End_Date'] . "</br>".
"Payment     :" ."   ". $displayrowsarr['Payment'] . "</br>";
echo "<form method=post action=../learnforlife/Project_details.php?id=$Proj_ID />
<input type=submit name=detsbtn value=Details />
</form>
<form method=post action=../learnforlife/Select_Stud4Project.php?id=$Proj_ID />
<input type=submit name=shwappbtn value=Show_Applicants />
</form>";
echo "<hr/></div></a>";



}
}
?>
</div>
<div id="footer">
</div>
</div>
</body>
</html>