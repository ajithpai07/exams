<?php 
session_start();
      if(!isset($_SESSION['aid'])){
      header("Location: admin.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
</head>
<body>
<div>
	<form method="post">
		<p style="float:right">
		<a href="logout.php">LOGOUT</a>
		</p>
		<a href="adddepartment.php">Add New Department</a><br>
		<a href="addstaff.php">Add New Staff</a><br>
		<a href="addstudent.php">Add New Student</a><br>
		<a href="addcourse.php">Add New Course</a><br>
		
		
	</form>
</div>
</body>
</html>