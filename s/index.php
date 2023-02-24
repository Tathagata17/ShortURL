<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet1.css">
    <title>shortURL</title>
  </head>
  <body>
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
    
    #$uid;
    $click = 1;
    $shorturl;
    $url = '';
    if (isset($_POST['url'])) 
    {
        $url = $_POST['url'];
    }
    $text = '';
    if (isset($_POST['text'])) {
        $text = $_POST['text'];
    }
    //$url = $_POST['url'];
    //$text = $_POST['text'];
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("sorry connection failed " . mysqli_connect_error());
    
    }
    $user=$_SESSION['username'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "INSERT INTO `urls`(`uid`, `urls`, `text`, `clicks`,`username`) VALUES ('','$url','$text','$click','$user')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='alert alert-success' role='alert'>
      ! you are ready to go with your generated shorten url 
      </div>";
            //sleep(5);
            header('Refresh:1 ; URL=home.php');
            //header("location:home.php");
        } 
        else {
            echo "<h1>Error</h1>";
        }
    }
    
  
    ?>
    <div id="main" style="display:flex;">
    <nav style="display:flex">
    <div id="sidepannel" style="height: 648px;
    width: 70px;
    background-color: #FFFFFF;">
    <h5>
      <?php
      if (isset($_SESSION['username'])) 
      {
      echo $_SESSION['username']; }
      ?>
    </h5>
    <br>
    <br>
    <h5>
      <a href="index.php">Home</a>
  </h5>
  <h5>
      <a href="home.php">My urls</a>
  </h5>

  <h5>
      <a href="signup.php">signup</a>
  </h5>
  <h5>
      <a href="logout.php">logout</a>
  </h5>
 
  </div>
    </nav>
    <div id="loginpart" style="margin-left:725px">
      <h1 id="logo">
        ShortURL
      </h1>
      <br>
      <br>
      <br>
      <form id="form" action="" method="POST">
          <input type="url" id="urlinput" placeholder="Url" name="url">
          <br><br><br><br><br>
          <input type="text" id="textinput" placeholder="Text" name="text">
          <br>
          <br><br><br><br>
        <button type="submit" id="button">Generate</button>
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