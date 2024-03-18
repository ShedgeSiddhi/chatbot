<?php

$host="10.101.149.188";
$user="root";
$pass="rootpassword";
$db="sqldb";

$con=mysqli_connect($host,$user,$pass,$db);

if(!$con)
{
	print("Not Connected<br>".mysql_error());

}
else
{
	//echo("Connected");
}






?>