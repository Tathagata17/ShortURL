<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShortURL</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:#6E80FC">
  <?php
  session_start();
  if (isset($_SESSION['login'])) 
  {
  if($_SESSION['login']==true)
  {
    // $_SESSION['username'];
  }
}
  else
  {
    echo "hello";
    echo isset($_SESSION['username']);
    header("location:login.php");
  }
$servername = "localhost";
$username = "root";
$password = "";
$database = "urlshort";

$url;
$urlshort;
$text;
$uid;
$click = 1;
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("sorry connection failed " . mysqli_connect_error());
}
?>

  <h1 style="color:white">
    ShortURL
  </h1>
<?php
#$link="google.com";
#echo "<a href='$link'>$link</a>";
$user=$_SESSION['username'];
$sqlq="SELECT  * FROM `urls` where username='$user'";
$result = mysqli_query($conn, $sqlq);
?>
<table style=" border-collapse: separate;border-spacing: 30px 0; color:white;" >
  <tr>
    <th style="color:white;" >Slno</th>
    <th style="color:white;">Text</th>
    <th style="color:white;">Shorturl</th>
    <th style="color:white;">click</th>
    <th style="color:white;">urls</th>
  </tr>
<?php

if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td style="color:white;"><?php echo $sn; ?> </td>
   <td style="color:white;"><?php echo $data['text']; ?> </td>
   <?php $shorturl= "/s/g.php?v=".$data['text']; echo" <td><a href='$shorturl'>shorturl</a></td>" ?>
   <td style="color:white;"><?php echo $data['clicks']; ?> </td>
   <td style="color:white;"><?php echo $data['urls']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
  </table>

  
  

          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
            
</body>

</html>