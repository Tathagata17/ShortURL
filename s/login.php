<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <title>shortURL</title>
</head>

<body>
  <?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "urlshort";
  $user = '';
  if (isset($_POST['username'])) {
    $user = $_POST['username'];
  }
  $pass='';
    if (isset($_POST['pass'])) {
    $pass = $_POST['pass'];
  }
  //$url = $_POST['url'];
  //$text = $_POST['text'];
  $conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
    die("sorry connection failed " . mysqli_connect_error());
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "SELECT * FROM `users` WHERE username ='$user'";
    $result = mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        if(password_verify($pass,$row['password']))
        {
          session_start();
          $_SESSION['login']=true;
          $_SESSION['username']=$user;
          echo "<div class='alert alert-success' role='alert'>
      ! yay ready to go
      </div>";
          header('Refresh:1 ; URL=index.php');
          
        }
        else
        {
          echo "<div class='alert alert-danger' role='alert'>
      ! wrong credentials
      </div>";
        }
      }
    }
    //if ($result) {
      //
      //sleep(5);
      //
      //header("location:home.php");
    //} else {
      //echo "<h1>Error</h1>";
    //}
  }
  ?>
  <div id="main">
    <div>
      <h1 id="logo1">ShortURL</h1>
    </div>
    <div id="loginpart">
      <h1 id="logo">
        LOGIN
      </h1>
      <br>
      <br>
      <br>
      <form id="form" action="" method="POST">
        <input type="text" id="urlinput" placeholder="Username" name="username" autocomplete="off">
        <br><br><br><br><br>
        <input type="password" id="textinput" placeholder="Password" name="pass" autocomplete="off">
        <br>
        <br><br><br><br>
        <button type="submit" id="button">Login</button>
      </form>
      <br>
      <br>
      <br>
      <h5 id="sign">New here?<a href="signup.php">signup<a> </h5>

    </div>
  </div>
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