<?php
$servername="localhost";
$username="root";


$conn=mysql_connect($servername, $username);

if(!$conn ){
die("Connection failed". $conn -> connect_error);
}
echo "...";

$dbselect=mysql_select_db("learnforlife");

?>