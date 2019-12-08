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
	<table border="1">
 <thead>
      <tr>
      <th>Question/Choice</th>
      <th>Select</th>
    </tr>
  </thead>
  <tbody>
   
    <?php 
    
     
    
    include('database.php');
$qno=$_SESSION['qno'];
	$qno++;
	$_SESSION['qno']=$qno;
	include('database.php');
	$testid=$_SESSION['testid'];
	$qid=$_SESSION['qid'];
	  

    $sql1 = mysqli_query($con,"SELECT * FROM `questions` WHERE testid='$testid' AND qid='$qid'");
    
    $res1 = mysqli_fetch_array($sql1);
    if(count($res1)==0)
        { $count=$_SESSION['check'];
          $count--;
           $_SESSION['check']=$count;
              if($count<0){
            echo "
         
          <script>
          alert('you have atempted all the questions ');
          window.location='submit.php';
          </script>
          ";

        }
    }
    if(isset($_POST['submit']))
{
  $sid=$_SESSION['sid'];
  if(isset($_POST['s1']))
  {   
     $ans=1;
         $sql="INSERT INTO answer(sid,testid,ans) VALUES ('$sid','$testid','$ans')";
        $result= mysqli_query($con,$sql);
      $qid++;
  $_SESSION['qid']=$qid;
  $qno--;
  $_SESSION['qno']=$qno;
      echo "
          <script>
          
          window.location='exam2.php';
          </script>
          ";
    }
      if(isset($_POST['s2']))
  {   
     $ans=2;
         $sql="INSERT INTO answer(sid,testid,ans) VALUES ('$sid','$testid','$ans')";
        $result= mysqli_query($con,$sql);
      $qid++;
  $_SESSION['qid']=$qid;
  $qno--;
  $_SESSION['qno']=$qno;
      echo "
          <script>
          
          window.location='exam2.php';
          </script>
          ";
    }
    
      if(isset($_POST['s3']))
  {   
     $ans=3;
         $sql="INSERT INTO answer(sid,testid,ans) VALUES ('$sid','$testid','$ans')";
        $result= mysqli_query($con,$sql);
      $qid++;
  $_SESSION['qid']=$qid;
  $qno--;
  $_SESSION['qno']=$qno;
      echo "
          <script>
          
          window.location='exam2.php';
          </script>
          ";
    }
    
      if(isset($_POST['s4']))
  {   
     $ans=4;
         $sql="INSERT INTO answer(sid,testid,ans) VALUES ('$sid','$testid','$ans')";
        $result= mysqli_query($con,$sql);
      $qid++;
  $_SESSION['qid']=$qid;
  $qno--;
  $_SESSION['qno']=$qno;
      echo "
          <script>
          
          window.location='exam2.php';
          </script>
          ";
    }
    
    
  }

    
      echo'
      <tr>
      <td>'.$res1['question'].'</td>

      </tr>
      
       <tr>
      <td>'.$res1['q1'].'</td>
      <td><input type="submit" name="s1" value="submit"></td>
      </tr>

       <tr>
      <td>'.$res1['q2'].'</td>
      <td><input type="submit" name="s2" value="submit"></td>
      </tr>

       <tr>
      <td>'.$res1['q3'].'</td>
      <td><input type="submit" name="s3" value="submit"></td>
      </tr>

       <tr>
      <td>'.$res1['q4'].'</td>
      <td><input type="submit" name="s4" value="submit"></td>
      </tr>
      
      

     
        
      </tr>
      ';
      
     
      ?>
  </tbody>
<?php
include('database.php');

  ?>

</body>

</html>