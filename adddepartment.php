<?php 
session_start();
      if(!isset($_SESSION['aid'])){
      header("Location: admin.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Department</title>
</head>
<body>
	<div>
		<form method="post">
			<label>Enter the Name of the New Department</label>
			<input type="text" name="dname" required>
			<input type="submit" value="create" name="create"><br>
			<a href="admindash.php">Go Back to Main Menu</a>
		</form>
	</div>
 <?php 
	 include('database.php');
	 if(isset($_POST['create']))
	 {
	    $dname=$_POST['dname'];

        $sql="INSERT INTO department(dname) VALUES ('$dname')";
        $result= mysqli_query($con,$sql);
          echo "
          <script>
          alert('Addition Successful');
          window.location='adddepartment.php';
          </script>
          ";
        
	
		
	 }
    ?>
</body>
</html>