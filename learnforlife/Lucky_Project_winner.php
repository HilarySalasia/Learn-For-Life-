<?php
include 'serverdets.php';
$Stud_ID=$_GET['id'];
$Proj_ID=$_GET['P_ID'];
$upd_awrd_info_sql=mysql_query("UPDATE apply_proj SET Lucky_Proj_Winner='$Stud_ID' WHERE Proj_ID='$Proj_ID' AND User_ID='$Stud_ID'");

mysql_query("UPDATE employer_proj SET Proj_Vetting='2' WHERE  Proj_ID='$Proj_ID'");
header("Location:index.php");


?>