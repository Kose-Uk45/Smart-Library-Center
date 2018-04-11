<?php
//retrieving form data entered by user
$user=$_POST['formName'];
$pass=$_POST['formPassword'];
//checking whether user has clicked submit or not
if(isset($_POST['formSubmit'])){
//checking whether form input are filled
  if(!empty($user && $pass)){
//connecting to database
$conn=mysqli_connect("localhost","myName","myPassword",myDatabase);
//retrieving the login data from the "login" table
$sql=mysqli_query($conn,'SELECT Name,Password FROM login');
    //looping through the retrieved data
    while($data=mysqli_fetch_array($sql))
    {
      //checking whether columns "Name and Password" in the login table are equal to the form data
        if($user==$data['Name'] && $pass==$data['Password'])
        {
          echo "Hi "."<b>$user</b> "."Welcome";
          return true;
        }
        else {
          echo "No user ";
          echo "<a href='login.php' > try again</a>";
          return false;
        }

    }

}
else{
  echo "fill all fields";
}
}
?>
<html>
<head>
<title>login</title>
</head>
<body>
<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?> ">
username<input type="text" name="formName" placeholder="your username"></br>
password<input type="password" name="formPassword" placeholder="your password"><br>
<input type="submit" name="formSubmit" value="login">
</form>
</body>
</html>
