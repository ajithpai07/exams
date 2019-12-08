<!DOCTYPE html>
<html>
<head>
	<title>Teacher Login</title>
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
	 if(isset($_POST['login']))
	 { session_start();
		$username=$_POST['Username'];
		$password=$_POST['Password'];
        $sql="SELECT * FROM `teacher` WHERE tid='$username' AND tpwd='$password'";
        $result= mysqli_query($con,$sql);
        $check= mysqli_fetch_array($result);
        if (isset($check)) 
        {$_SESSION['tid']=$username;
          echo "
          <script>
          alert('Login Successful');
          window.location='teacherdash.php';
          </script>
          ";
        }
        else
        {
           echo "
          <script>
          alert('Login Unsuccessful');
          window.location='teacher.php';
          </script>
          ";
        }
	
		
	 }
    ?>
</body>
</html>