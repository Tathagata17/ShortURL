
<?php

$servername="localhost";
$username="root";
$password="";
$database="urlshort";

$url;
$text;
$uid;
$urlshort;
$value;
$click=1;
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
  die("sorry connection failed ".mysqli_connect_error());

}

$value=$_GET['v'];
$sqlq="SELECT  `urls` FROM `urls` WHERE `text`='$value'";
$result = mysqli_query($conn, $sqlq);
$row=mysqli_fetch_assoc($result);
$link= $row['urls'];
header("Location:".$link);
?>
   




