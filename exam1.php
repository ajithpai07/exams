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
	$_SESSION['qno']=$qno;
	include('database.php');
	$testid=$_SESSION['testid'];
	$qid=$_SESSION['qid'];
	  
	$sql="SELECT * FROM `questions` WHERE testid='$testid' AND qid='$qid' ";
        $result= mysqli_query($con,$sql);
        $check= mysqli_fetch_array($result);
        if(count($check)==0)
        { $count=$_SESSION['check'];
          $count--;
           $_SESSION['check']=$count;
              if($count<0){
            
        $cid=  $_SESSION['cid'];
         $sql1="SELECT * FROM `course` WHERE cid='$cid'";
        $result1= mysqli_query($con,$sql1);
        $check1= mysqli_fetch_array($result1);
         $_SESSION['cname']=$check1['cname'];
        $tid=$check1['tid'];
         $sql2="SELECT * FROM `teacher` WHERE tid='$tid'";
        $result2= mysqli_query($con,$sql2);
        $check2= mysqli_fetch_array($result2);
        $_SESSION['tname']=$check2['tname'];
            echo "
         
          <script>
          alert('you have atempted all the questions ');
          window.location='submit.php';
          </script>
          ";

        }
         }
      

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

<input type="submit" name="submit" value="submit">
</form>
<?php
include('database.php');
if(isset($_POST['submit']))
{
  $sid=$_SESSION['sid'];
  if(isset($_POST['radio']))
  {   
     $ans=$_POST['radio'];
         $sql="INSERT INTO answer(sid,testid,ans) VALUES ('$sid','$testid','$ans')";
        $result= mysqli_query($con,$sql);
      $qid++;
  $_SESSION['qid']=$qid;
  $qno--;
  $_SESSION['qno']=$qno;
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