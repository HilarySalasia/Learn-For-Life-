<?php
if(isset($_POST['loginsubmit'])){
include 'serverdets.php';
global $conn;
$loginemail=$_POST['loginemail'];
$loginpass=md5($_POST['loginpass']);
$adminemail="admin@learnforlife.com";
$adminpass=md5("Learnforlife");
if ($loginemail == $adminemail){
	if ($loginpass == $adminpass){
	setcookie("StdUser", " ", time() -3600, "/" );
	setcookie("EmpUser", " ", time() - 3600, "/" );
	setcookie("administrator", "admin", time() + 3600, "/" );
	header("Location: index.php");
	}
}
$loginsql=mysql_query("SELECT * FROM employers WHERE Email='$loginemail'");
If(mysql_num_rows($loginsql)>0){
	$passwordsql=mysql_query("SELECT * FROM employers WHERE Email='$loginemail'");
	
		while($row=mysql_fetch_array($passwordsql)){
		$servpass= $row['Password'];
		$cookiename="EmpUser";
		$cookiempid=$row['EmpID'];
		}
			if ($loginpass == $servpass){
			$message="Login Successfull..";
			setcookie("administrator", "admin", time() - 3600, "/" );
			setcookie("StdUser", $cookiempid, time() -3600, "/" );
			setcookie($cookiename, $cookiempid, time() + 3600, "/" );
			header("Location:index.php");
			echo "</br>". $_COOKIE['EmpUser'];
			}else{
			$message="Wrong Password";
			
			}
}else{
$loginsql2=mysql_query("SELECT * FROM students WHERE Email='$loginemail'");
	If(mysql_num_rows($loginsql2)>0){
	$passwordsql2=mysql_query("SELECT * FROM students WHERE Email='$loginemail'");
		while($passrow2= mysql_fetch_array($passwordsql2)){
		$servpass2=$passrow2['Password'];
		$stdtID=$passrow2['StdtID'];
		}
			if ($loginpass == $servpass2){
			$message= "Login Successfull..";
			setcookie("administrator", "admin", time() - 3600, "/" );
			setcookie("EmpUser", "EmpUser", time() - 3600, "/" );
			setcookie("StdUser", $stdtID, time() + 3600, "/" );
			header("Location: index.php");
			}else{
			$message= "Wrong Passord";
			
			}
	}
	
	
}


function passmatch(){

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
<div id="content" background="Learn For Life.png">

<h2>Login Page</h2>
<center><form method="post" action="">
<?php
global $message;
?>
<center><input type="email" name="loginemail" placeholder="Email" class="formstyle"><br/>
<input type="password" name="loginpass" placeholder="Password" class="formstyle"><br/>
<input type="submit" name="loginsubmit" class="formstyle">
<span class="error"> <?php echo $message; ?></span>
</form>
</div></center>

</div>
<div id="footer">
</div>
</div>
</body>
</html>