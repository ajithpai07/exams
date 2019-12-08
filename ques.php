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
	<?php 
	$qno=$_SESSION['qno'];
	$qno++;
    $_SESSION['qno']=$qno;
	 ?>
	<form method="post">
		<label>Question no</label>
<input type="text" name="qno" required value="<?php echo  $qno ?>"><br>
<label>Question</label>
<input type="text" name="question" required><br>
<label>Choice 1</label>
<input type="text" name="c1" required><br>
<label>Choice 2</label>
<input type="text" name="c2" required><br>
<label>Choice 3</label>
<input type="text" name="c3" required><br>
<label>Choice 4</label>
<input type="text" name="c4" required><br>
<label>Answer</label>
<input type="text" name="ans" required><br>
<input type="submit" name="s1" value="Submit and Add another question">
<input type="submit" name="s2" value="Submit and End">
	</form>
<?php
include('database.php');
$one=1;

        $sql1 = mysqli_query($con,"SELECT * FROM `test` WHERE now='$one'");
    $res1 = mysqli_fetch_array($sql1);
        $testid=$res1['testid'];
	 if(isset($_POST['s1']))
	 {
	 	$ch1=$_POST['c1'];
	 	$ch2=$_POST['c2'];
	 	$ch3=$_POST['c3'];
	 	$ch4=$_POST['c4'];
	 	$ans=$_POST['ans'];
	 	$ques=$_POST['question'];
	 	$sql="INSERT INTO questions(testid,question,q1,q2,q3,q4,answer) VALUES ('$testid','$ques','$ch1','$ch2','$ch3','$ch4','$ans')";
        $result= mysqli_query($con,$sql);
        $qno=$_SESSION['qno'];
	$qno--;
    $_SESSION['qno']=$qno;
       
          echo "
          <script>
          alert('Addition Successful');
          window.location='ques.php';
          </script>
          ";
	 }
	 if(isset($_POST['s2'])){
	 	$ch1=$_POST['c1'];
	 	$ch2=$_POST['c2'];
	 	$ch3=$_POST['c3'];
	 	$ch4=$_POST['c4'];
	 	$ans=$_POST['ans'];
	 	$ques=$_POST['question'];
	 
	 	   
	 	$sql="INSERT INTO questions(testid,question,q1,q2,q3,q4,answer) VALUES ('$testid','$ques','$ch1','$ch2','$ch3','$ch4','$ans')";
        $result= mysqli_query($con,$sql);
  
       $sql2="UPDATE test SET now=0 WHERE testid=$testid";
        $result2= mysqli_query($con,$sql2);
          echo "
          <script>
          alert('Addition Successful');
          window.location='teacherdash.php';
          </script>
          ";

	 }
  ?>
</body>
</html>