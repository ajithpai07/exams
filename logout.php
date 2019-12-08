<?php
session_start();
     unset($_SESSION['sid']);
     unset($_SESSION['obid']); 
     unset($_SESSION['mid']);
     unset($_SESSION['aid']);  
      session_destroy();  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logged out</title>
	
</head>
<body>
<div>
	<form method="post">
		<label>YOU HAVE BEEN SUCCESSFULLY LOGGED OUT</label>
	</form>
</div>
</body>
</html>