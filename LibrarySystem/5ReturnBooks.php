<?php
$Student_ID="";
$flag=false;
$mydata=array();
$id=$name=$author=$issue=$return=$status="";
$Issuee_id="";
if(isset($_POST['search_ID']))
{

  $Student_ID=$_POST['Student_ID'];
  $conn2= mysqli_connect('localhost','root','12345','LibrarySystem');
  $query=mysqli_query($conn2," select * from Book where Issuee_ID=".$Student_ID);
  if($query)
  {
    $i=0;

    while($data=mysqli_fetch_array($query))
    {


            array_push($mydata,$data[$i]);


     

        //  echo $data[6];
        //  $id=$data['0'];
          //$_SESSION['BookId']=$data['0'];
          //$name=$data['1'];
        //  $author=$data['2'];
        //  $issue=$data['3'];
        //  $return=$data['4'];
        //  $status=$data['5'];
          //$Issuee_id=$data['6'];

    }



  }
  else {
    $msg="No such book found";
  }
  mysqli_close($conn);


}

?>


<html>
<head>
   <title>Return Books</title>
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
           <li><a href="" class="active">Return Book</a></li>
       </ul>

       <!-- Getting Student Id -->
       <div class="col-sm-2 well" style="margin-top:20px">

             <center><h4 style="color:green">Search Student ID</h4> </center>
             <form action="<?php $_SERVER['PHP_SELF']; ?>" class="form-group" method="post">
               <div class="form-group">
                 <label style="color:red;">Enter Student ID</label>
                 <input type="text" name="Student_ID"  required class="form-control">
               </div>
               <input type="submit" name="search_ID" value="Search" class="btn btn-success" style="width:45%">
             </form>

        </div>
        <div class="col-sm-9" style="margin-top:20px;margin-left:10px ">
          <?php
          /*
             if($flag)
             {
             */
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
                     <th>Issuee ID</th>
                   </tr>
                 </thead>
                 <tbody>

                   <?php
                   foreach($mydata as $key => $value) {
                    ?>
                     <tr>
                       <td><?php echo $value; ?></td>
                     </tr>

                     <?php
                         }
                         ?>
                 </tbody>
               </table>
             </div>

               <?php

          ?>
        </div>




    </div>
  </div>
</div>
