<?php 
session_start();
      if(!isset($_SESSION['tid'])){
      header("Location: teacher.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher Dashboard</title>
</head>
<body>
<div>
	<form method="post">
		<p style="float:right">
		<a href="logout.php">LOGOUT</a>
		</p>
		<a href="quiz.php">Create new Test</a><br>
		<a href="open.php">Open test</a><br>
		<a href="close.php">close test</a><br>
		<a href="result.php">view result</a><br>
		
		
		
	</form>
</div>
</body>
</html>