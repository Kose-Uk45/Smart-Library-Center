<?php
session_start();

$msg="";
if(isset($_POST['submit']))
{

  $email=$_POST['email'];
  $password=$_POST['passwd'];
  $conn= mysqli_connect('localhost','root','12345','LibrarySystem');
  $query=mysqli_query($conn,"select Email,Password from login where Email='".$email."' and password='".$password."'");

  if($query)
  {
    while($data=mysqli_fetch_array($query))
    {

        if($data[0]===$email && $data[1]===$password)
        {
          $_SESSION['email']=$data[0];
          $_SESSION['passwd']=$data[1];
          header('location:2home.php');
        }

    }
  }
  else {
    $msg="No such username and password";
  }

}

?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <title> admin login</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script  src="bootstrap/js/bootstrap.min.js"></script>
  <script  src="bootstrap/jquery-3.2.1.js"></script>
  <!--
<style>

body{

  background-color: white;
  margin-left: auto;
  margin-top: 10%;
  text-align: center;
  font-family: inherit;

}
</style>
-->
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

          <div class="col-sm-8 col-sm-offset-2" style="margin-top:100px"  >

        <?php
        if(!empty($msg))
        {
          echo $msg;

        } ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="form-group" method="post">
          <div class="form-group" class="form-control">
            <label style="color:red;">email</label>
            <input type="email" name="email" placeholder="enter email" size="55%" required></br></br></br>
          </div>

          <div class="form-group" class="form-control">
            <label style="color:#990000;">password</label>
            <input type="password" name="passwd" placeholder="enter password" size="50%" required>
          </div>

          <input type="submit" name="submit" value="login" class="btn btn-success">

        </form>
      </div>
    </div>
  </div>
  </div>
</body>
</html>
