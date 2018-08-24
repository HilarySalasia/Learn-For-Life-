<?php
include 'serverdets.php';
$loginsql=mysql_query("SELECT * FROM employers WHERE Email='$loginemail'");
while($row=mysql_fetch_field($loginsql)){
echo $row['Name'];
}

?>
<html>
<head>
<title></title>
</head>
<body>
</body>
</html>