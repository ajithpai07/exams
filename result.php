<?php 
session_start();
      if(!isset($_SESSION['tid'])){
      header("Location: teacher.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select Test</title>
</head>
<body>
	<table border="1">
 <thead>
      <tr>
      <th>Test ID</th>
      <th>course id</th>
      <th>exam code</th>
      <th>Select</th>
    </tr>
  </thead>
  <tbody>
   
    <?php 
    
     
    
    include('database.php');

    
     $tid=$_SESSION['tid'];
    $sql = mysqli_query($con,"SELECT * FROM `course` WHERE tid='$tid'");
    $res = mysqli_fetch_array($sql);
    $cid=$res['cid'];
    $zero=3;
    $sql1 = mysqli_query($con,"SELECT * FROM `test` WHERE cid='$cid' AND start='$zero'");
    
    while ($res1 = mysqli_fetch_array($sql1)) 
    {
      echo'
      <tr>
      <td>'.$res1['testid'].'</td>
      
      <td>'.$res1['cid'].'</td>

      <td>'.$res1['code'].'</td>
      

      <td><a href="view.php?testid='.$res1['testid'].'">View Result</a></td>
        
      </tr>
      ';
      
     }
  
      ?>
  </tbody>
</table>
</body>
</html>
