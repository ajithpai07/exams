<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
</head>
<body>
	<div>
<form method="post">
<label>Username</label>
<input type="name" name="Username" required><br>
<label>Password</label>
<input type="password" name="Password" required><br>
<input type="submit" value="Login" name="login">
<a href="home.php">Back to Select Login Page</a>
</form></div>

<?php 
	 include('database.php');
   session_start();
	 if(isset($_POST['login']))
	 {
		$username=$_POST['Username'];
		$password=$_POST['Password'];
        $sql="SELECT * FROM `student` WHERE sid='$username' AND spwd='$password'";
        $result= mysqli_query($con,$sql);
        $check= mysqli_fetch_array($result);
        $_SESSION['dno']=$check['dno'];
        if (isset($check)) 
        {
           $_SESSION['sid']= $username;
          echo "
          <script>
          alert('Login Successful');
          window.location='studentdash.php';
          </script>
          ";
        }
        else
        {
           echo "
          <script>
          alert('Login Unsuccessful');
          window.location='student.php';
          </script>
          ";
        }
	
		
	 }
    ?>
</body>
</html>