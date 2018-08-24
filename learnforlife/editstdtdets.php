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

if (isset( $_COOKIE['StdUser'])){
$StdentID= $_COOKIE['StdUser'];
$getstuddetsql=mysql_query("SELECT * FROM students WHERE StdtID='$StdentID'");
$getrow=mysql_fetch_assoc($getstuddetsql);
$Namerow=$getrow['Name'];
$locationrow=$getrow['Location'];
$Skillsrow=$getrow['Skills'];
$stdtwrkexprow=$getrow['Workexp'];
$stdteduattrow=$getrow['Educationatt'];

if(isset($_POST['stdntsubmit'])){


$name=$_POST['allnames'];
$location=$_POST['location'];
$skills=$_POST['skills'];
$workexp=$_POST['WorkExp'];
$Educationatt=$_POST['eduatt'];
$updatestddetsql = mysql_query("UPDATE students SET Name='$name', Location='$location', Skills='$skills', 
								Workexp='$workexp', Educationatt='$Educationatt' where StdtID='$StdentID'");

if ($updatestddetsql) {
    
    echo "Update Successfully... ";
	header("Location: index.php");
} else {
    echo "Error: " . $sql  . mysql_error($conn);
}
$message = "Success!";
}
}else{$message="You are not Logged in";}


mysql_close();
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
<span class="error"> <?php echo $passwrdmatch; ?></span></center>
Names<br/>
<center><input type="text" name="allnames" placeholder="Names" value="<?php echo $Namerow;?>" class="formstyle" required><br/></center>
Location<br/>
<center><input type="" name="location" placeholder="Location" value="<?php echo $locationrow;?>"class="formstyle" required><br/></center>
Skills<br/>
<center><input type="text" name="skills" placeholder="Skills" value="<?php echo $Skillsrow;?>"class="formstyle" required><br/></center>
Work Experience<br/>
<center><textarea name="WorkExp" placeholder="Work Experience" id="textareas" required><?php echo $stdtwrkexprow;?></textarea><br/></center>
Educational Attainment<br/>
<center><textarea name="eduatt" placeholder="Educational Attainment" id="textareas" required><?php echo $stdteduattrow;?></textarea><br/>
<input type="submit" name="stdntsubmit"></center>
</form>
</div>
<div id="footer">
</div>
</div>

</body>
</html>