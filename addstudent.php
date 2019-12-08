<?php 
session_start();
      if(!isset($_SESSION['aid'])){
      header("Location: admin.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
</head>
<body>
	<div>
		<form method="post">
			<label>Enter the name of Student</label>
			<input type="text" name="name"><br>
			<label>Enter the Password</label>
			<input type="text" name="password"><br>
			<label>Enter the department name</label>
			<select name="department" required>
  <option value="CSE">CSE</option>
  <option value="EEE">EEE</option>
  <option value="ECE">ECE</option>
  <option value="MEE">MEE</option>
  <option value="CIV">CIV</option>
  <option value="OTHER">OTHER</option>
</select><br>
<input type="submit" value="Add" name="add"><br>
<a href="admindash.php">Go Back to Main Menu</a>
		</form>
	</div>


<?php 
	 include('database.php');
	 if(isset($_POST['add']))
	 {
		$sname=$_POST['name'];
		$spassword = $_POST['password'];
		
		$check=$_POST['department'];
		if ($check == "CSE") {
			$dno = 1;
		}
		elseif ($check == "EEE") {
			$dno = 2;
		}
		elseif ($check == "ECE") {
			$dno = 3;
		}
		elseif ($check == "MEE") {
			$dno = 4;
		}
		elseif ($check == "CIV") {
			$dno = 5;
		}
		elseif ($check == "OTHER") {
			$dno = 6;
		}
		
		
       $sql="INSERT INTO student(sname,spwd,dno) VALUES ('$sname','$spassword','$dno')";
        $result= mysqli_query($con,$sql);
       
          echo "
          <script>
          alert('Addition Successful');
          window.location='addstudent.php';
          </script>
          ";
       
	
		
	 }
    ?>
    
</body>
</html>