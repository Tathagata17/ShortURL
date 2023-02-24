<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
    <title>shortURL</title>
  </head>
  <body>
    <?php

   $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "urlshort";
    if (isset($_POST['username'])) 
    {
        $user = $_POST['username'];
    }
    $password = '';
    if (isset($_POST['password'])) {
        $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
    }
    if (isset($_POST['fname'])) 
    {
        $fname = $_POST['fname'];
    }
    if (isset($_POST['lname'])) 
    {
        $lname = $_POST['lname'];
    }
    if (isset($_POST['phno'])) 
    {
        $phno = $_POST['phno'];
    }

    //$url = $_POST['url'];
    //$text = $_POST['text'];
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("sorry connection failed " . mysqli_connect_error());
    
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $sql = "INSERT INTO `users`(`uid`, `fname`, `lname`, `username`, `password`, `phonenumber`) VALUES ('','$fname','$lname','$user','$hash','$phno')";
      
      $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='alert alert-success' role='alert'>
      ! you have successfully registered.
      </div>";
            //sleep(5);
            header('Refresh:1 ; URL=login.php');
            //header("location:home.php");
        } 
        else {
            echo "<h1>Error</h1>";
        }
    }
    ?>
    <div id="main">
        <div>
       <h1 id="logo1">ShortURL</h1>
</div>
    <div id="loginpart">
      <h1 id="logo">
        SIGN-UP
      </h1>
      <br>
      <form id="form" action="" method="POST">
      <input id="fname" type="text" placeholder="First Name" name="fname" autocomplete="off" style=" height: 48px;
    width:35%;
    margin-left: 14%;
    border-radius: 68px;
    border: none;
    background-color: #D9D9D9;
    padding-left: 12px;">
      <input  id="lname" type="text"  placeholder="Last Name" name="lname" autocomplete="off" style=" height: 48px;
    width:35%;
    margin-left: 2%;
    border-radius: 68px;
    border: none;
    background-color: #D9D9D9;
    padding-left: 12px;">
    <br>
    <br>
          <input type="text" id="urlinput" placeholder="Username" name="username" autocomplete="off">
          <br><br><br><br><br>
          <input type="text" id="textinput" placeholder="Phno" name="phno" autocomplete="off">
          <br><br><br>
          <input type="password" id="textinput" placeholder="Password" name="password" autocomplete="off">
          <br>
          <br><br><br><br>
        <button type="submit" id="button">Sign-up</button>
      </form>
      </div>
    </div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>