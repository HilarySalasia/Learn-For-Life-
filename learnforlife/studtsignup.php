<?php
if(isset($_POST['stdntsubmit'])){

include 'serverdets.php';
$name=$_POST['allnames'];
$email=$_POST['emailaddress'];
$location=$_POST['location'];
$skills=$_POST['skills'];
$workexp=$_POST['WorkExp'];
$Educationatt=$_POST['eduatt'];
$Password=md5($_POST['stdtpasswrd']);
$confirmpasswrd=md5($_POST['confstdtpasswrd']);
$selectsql=mysql_query("SELECT Email FROM students WHERE Email='$email'");
if(!$selectsql){
echo mysql_error();
}

If(mysql_num_rows($selectsql)>0){
$message="The Email Address Entered Already Exists";
}else{
if ($Password==$confirmpasswrd){
$sql = mysql_query("INSERT INTO students (Name, Email, Location, Skills, Workexp, Educationatt, Password)
VALUES ('$name','$email', '$location', '$skills', '$workexp', '$Educationatt', '$Password')");

if ($sql) {
    
    echo "User Added Successfully......";
	header("Location: index.php");
} else {
    echo "Error: " . $sql  . mysql_error($conn);
}
$message = "Success!";
}else{
$passwrdmatch="Error: Password Doesn't Match. Record Not Added";
}
}
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
<input type="text" name="allnames" placeholder="Names" class="formstyle" required><br/>
<input type="email" name="emailaddress" placeholder="Email" class="formstyle" required><br/>
<input type="password" name="stdtpasswrd" placeholder="Password" class="formstyle" required><br/>
<input type="password" name="confstdtpasswrd" placeholder="Confirm Password" class="formstyle" required><br/>
<input type="" name="location" placeholder="Location" class="formstyle" required><br/>
<input type="text" name="skills" placeholder="Skills" class="formstyle" required><br/>
<textarea name="WorkExp" placeholder="Work Experience" id="textareas" required></textarea><br/>
<textarea name="eduatt" placeholder="Educational Attainment" id="textareas" required></textarea><br/>
<input type="submit" name="stdntsubmit">
</form>
</div>
<div id="footer">
</div>
</div>

</body>
</html>