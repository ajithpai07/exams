<?php 
session_start();
      if(!isset($_SESSION['tid'])){
      header("Location: teacher.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
</head>
<body>
		<table border="1">
 <thead>
      <tr>
      <th>Student ID</th>
      <th>student Name</th>
      <th>Score</th>
      
    </tr>
  </thead>
  <tbody>
   
    <?php 
    
     $testid=$_GET['testid'];
    
    include('database.php');

    
     
    $sql1 = mysqli_query($con,"SELECT * FROM `result` WHERE testid='$testid'");
    
    while ($res1 = mysqli_fetch_array($sql1)) 
    { $sid=$res1['sid'];
      $sql2 = mysqli_query($con,"SELECT * FROM `student` WHERE sid='$sid'");
      $res2 = mysqli_fetch_array($sql2);
      echo'
      <tr>
      <td>'.$res1['sid'].'</td>

      <td>'.$res2['sname'].'</td>
      
      <td>'.$res1['score'].'</td>

      </tr>
      ';
      
     }
  
      ?>
  </tbody>
</table>
<a href="teacherdash.php">Go to dashboard</a>
</body>
</html>