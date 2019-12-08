<?php 
session_start();
      if(!isset($_SESSION['tid'])){
      header("Location: teacher.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Questions</title>
</head>

<body>
	
	<form method="post">
		<label>code for test</label>
<input type="text" name="code" required ><br>
<label>Date</label>
<input type="date" name="date" required><br>

<input type="submit" name="s2" value="create">
	</form>
<?php
include('database.php');
$one=1;
$_SESSION['qno']=0;
	 if(isset($_POST['s2']))
	 {
	 	$cid=$_SESSION['cid'];
	 	$date=$_POST['date'];
	 	$code=$_POST['code'];
	 	$now=1;
	 	$start=0;
	 	$sql="INSERT INTO test(`cid`,`date`,`start`,`code`,`now`) VALUES ('$cid','$date','$start','$code','$now')";
        $result= mysqli_query($con,$sql);
       
          echo "
          <script>
          alert('Addition Successful');
          window.location='ques.php';
          </script>
          ";
	 }
	 
  ?>
</body>
</html>