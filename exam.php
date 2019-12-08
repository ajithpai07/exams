<?php 
session_start();
      if(!isset($_SESSION['sid'])){
      header("Location: student.php");}  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
</head>
<body>
	<?php  
	$qno=$_SESSION['qno'];
	$qno++;
	$_SESSION['check']=0;
	$_SESSION['qno']=$qno;
	include('database.php');
	$testid=$_SESSION['testid'];
	$sql="SELECT * FROM `questions` WHERE testid='$testid'";
        $result= mysqli_query($con,$sql);
        $check= mysqli_fetch_array($result);
        
        $qid=$check['qid'];
        $qid++;
        $_SESSION['qid']=$qid;
        $quu=$check['question'];
        $q1=$check['q1'];
        $q2=$check['q2'];
        $q3=$check['q3'];
        $q4=$check['q4'];
        $ans=$check['answer'];

	 ?>
<form  method="post">
<label>Qno.</label>
<input type="text" name="qno" value="<?php echo  $qno ?>"><br>
<input type="text" name="qno" value="<?php echo  $quu ?>"><br>
<input type="radio" name="radio" value="1"><?php echo  $q1 ?><br>
<input type="radio" name="radio" value="2"><?php echo  $q2 ?><br>
<input type="radio" name="radio" value="3"><?php echo  $q3 ?><br>
<input type="radio" name="radio" value="4"><?php echo  $q4 ?><br>
<input type="submit" name="submit" value="Next">
</form>
<?php
include('database.php');
if(isset($_POST['submit']))
{
	$qno--;
	$_SESSION['qno']=$qno;
	$sid=$_SESSION['sid'];
	if(isset($_POST['radio']))
	{   
     $ans=$_POST['radio'];
         $sql="INSERT INTO answer(sid,testid,ans) VALUES ('$sid','$testid','$ans')";
        $result= mysqli_query($con,$sql);
				
			echo "
          <script>
          
          window.location='exam1.php';
          </script>
          ";
		}
		
	}

  ?>

</body>
</html>
