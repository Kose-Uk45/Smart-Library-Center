<?php
 session_start()

 ?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <title>home page</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script  src="bootstrap/js/bootstrap.min.js"></script>
  <script  src="bootstrap/jquery-3.2.1.js"></script>

</head>
<body>

<div class="container">
  <div class="row">
<center> <h1 >Welcome to our Library Managaement systems</h1> </center>
  <nav class="navbar navbar-default" style="margin-top:40px">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="Home.php">Brand</a>
      </div>

      <ul class="nav navbar-nav">
        <li class="active"><a href="2home.php">Home</a></li>
        <li><a href="3AddBooks.php">Add book</a></li>
        <li><a href="4IssueBooks.php">Issue Book</a></li>
        <li><a href="5ReturnBooks.php">Return Book</a></li>
        <li><a href="6DeleteBooks.php">Delete Book</a></li>
      </ul>
      </div>
</nav>

  </div>
</div>




</body>
</html>
