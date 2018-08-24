<?php
if(isset($_POST['emplsubmit'])){

include 'serverdets.php';
$name=$_POST['empname'];
$email=$_POST['empemail']; 
$contactsdets=$_POST['empcontact'];
$description=$_POST['empdesc'];
$Password=md5($_POST['emppass']);
$confpasswrd=md5($_POST['confemppass']);
$selectsql=mysql_query("SELECT Email FROM employers WHERE Email='$email'");
if(!$selectsql){
echo mysql_error();
}

If(mysql_num_rows($selectsql)>0){
$message="The Email Address Entered Already Exists";
}else{
if ($Password==$confpasswrd){
$sql = mysql_query("INSERT INTO employers (Name, Contactdets, Description, Email, Password)
VALUES ('$name','$contactsdets', '$description', '$email', '$Password')");

if ($sql) {
    
    echo "User has Been Added..";
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
<?php 
global $message, $passwrdmatch;
echo $message; ?>
<form method="post" action="">
<center><span class="error"> <?php echo $passwrdmatch; ?></span></center>
<center><input type="text" name="empname" placeholder="Name" class="formstyle"><br/>
<input type="numbers" name="empcontact" placeholder="Contact Details" class="formstyle"><br/>
<input type="email" name="empemail" placeholder="Email" class="formstyle"></br>
<input type="password" name="emppass" placeholder="Password" class="formstyle"></br>
<input type="password" name="confemppass" placeholder="Confirm Password" class="formstyle"></br>
<textarea name="empdesc" placeholder="Employer Description" id="textareas" ></textarea><br/>
<input type="submit" name="emplsubmit">
</form>
</div>
<div id="footer">
</div>
</div>
</body>
</html>