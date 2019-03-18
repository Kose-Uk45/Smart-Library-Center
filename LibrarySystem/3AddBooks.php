<?php
session_start();
$msg="";
if(isset($_POST['submit']))
{

  $id=$_POST['ID'];
  $book_name=$_POST['bookname'];
  $book_author=$_POST['author'];
  $conn=mysqli_connect('localhost','root','12345','LibrarySystem');
  $query= mysqli_query($conn,"insert into Book values('".$id."','".$book_name."','".$book_author."','','','No','0000000')");
  if($query)
  {
      $msg="Successfully Inserted";

  }
  else {
      $msg="Unable to insert please try again";
  }


}

 ?>
 <html>
<head>
    <title>Add new Book</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script  src="bootstrap/js/bootstrap.min.js"></script>
    <script  src="bootstrap/jquery-3.2.1.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12" >
        <ul class="breadcrumb" style="margin-top:30px">
          <li><a href="2home.php">Home</a></li>
            <li><a href="" class="active">Add new Book</a></li>
        </ul>
          <div class="col-sm-8 col-sm-offset-2" style="margin-top:50px">
              <div class="jumbotron">
                <?php

                  if(!empty($msg))
                  {
                    ?>
                    <script>alert('<?php echo $msg; ?>') </script>

                    <?php
                  }
                ?>
                <center><h3 style="color:green">Add new Book</h3> </center>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" class="form-group" method="post">
                  <div class="form-group">
                    <label style="color:red;">Enter Book name</label>
                    <input type="text" name="bookname" placeholder="Enter Book name"  required class="form-control">
                  </div>

                  <div class="form-group">
                    <label style="color:#990000;">Author</label>
                    <input type="text" name="author" placeholder="Author" required class="form-control">
                  </div>
                  <div class="form-group">
                    <label style="color:#990000;">Id</label>
                    <input type="text" name="ID" placeholder="Enter book Id" class="form-control" required>
                  </div>


                  <center>
                  <input type="submit" name="submit" value="Add Book" class="btn btn-success" style="width:45%">
                  <input type="reset" value="Clear" class="btn btn-success" style="width:45%">
                  <center>
                </form>





              </div>

     </div>
   </div>
 </div>





</body>
 </html>
