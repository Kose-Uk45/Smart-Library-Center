<?php
session_start();
$msg="";
$flag=false;
$id=$name=$author=$issue=$return=$status="";
if(isset($_POST['searchBook']))
{


  $BookID=$_POST['bookId'];
  $conn= mysqli_connect('localhost','root','12345','LibrarySystem');
  $query=mysqli_query($conn,"select * from Book where Id='".$BookID."'");

  if($query)
  {

    while($data=mysqli_fetch_array($query))
    {
        if($data[0]===$BookID)
        {
          $id=$data['0'];
          $_SESSION['BookId']=$data['0'];
          $name=$data['1'];
          $author=$data['2'];
          $issue=$data['3'];
          $return=$data['4'];
          $status=$data['5'];
          $flag=true;
        }
        if($flag==false) {
         $msg="No such book found";
        }

    }

  }
  else {
    $msg="No such book found";
  }
  mysqli_close($conn);
}

if(isset($_POST['iss']))
{


  $book_Id=$_SESSION['BookId'];
  $issuee_id=$_POST['Id'];
  $today = date("F j, Y, g:i a");
  $conn2= mysqli_connect('localhost','root','12345','LibrarySystem');
  $query=mysqli_query($conn2,"update Book set Issuee_ID=".$issuee_id.", Issue_date='".$today."', status='Yes' where Id=".$book_Id."");
  if($query)
  {
    echo "Successfully issued";
  }
  else {
    echo " No such Id existed";
  }

  mysqli_close($conn);

}



?>


<html>
<head>
   <title>Issue Book</title>
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
           <li><a href="" class="active">Issue Book</a></li>
       </ul>

         <div class="col-sm-4 well" style="margin-top:50px">

                  <?php
                  if(!empty($msg)) {
                    ?>
                    <script> alert( '<?php echo $msg ;?>')</script>
                      <?php
                  }
                   ?>
               <center><h3 style="color:green">Search Book</h3> </center>
               <form action="<?php $_SERVER['PHP_SELF']; ?>" class="form-group" method="post">
                 <div class="form-group">
                   <label style="color:red;">Enter book ID</label>
                   <input type="text" name="bookId" placeholder="Enter book Id"  required class="form-control">
                 </div>
                 <input type="submit" name="searchBook" value="Search Book" class="btn btn-success" style="width:45%">
               </form>

          </div>
             <div class="col-sm-7" style="margin-top:50px;margin-left:10px ">
               <?php
                  if($flag)
                  {
                    ?>
                    <div class="well">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Book ID</th>
                          <th>Book name</th>
                          <th>Author</th>
                          <th>Issue date</th>
                          <th>Return date</th>
                          <th>Issued</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td><?php echo $id; ?></td>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $author; ?></td>
                          <td><?php echo $issue; ?></td>
                          <td><?php echo $return; ?></td>
                          <td><?php echo $status; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                    <?php
                }
               ?>
             </div>

                 <?php
                  if($status==="No")
                  {
                    ?>
                    <div class="col-sm-12">
                      <div class="col-sm-4 well">
                    <center><h3 style="color:green">Issue Book</h3> </center>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" class="form-group" method="post">
                      <div class="form-group">
                        <label style="color:red;">Enter Issuee ID</label>
                        <input type="number" name="Id" placeholder="Enter book Id"  required class="form-control">
                      </div>
                      <input type="submit" name="iss" value="Issue" class="btn btn-success" style="width:45%">
                    </form>
                  </div>
                 </div>
                    <?php
                  }


                  ?>

    </div>
  </div>
</div>





</body>
</html>
