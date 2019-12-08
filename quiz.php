<?php 
session_start();
      if(!isset($_SESSION['tid'])){
      header("Location: teacher.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Test</title>
</head>
<body>
	<form method="post">
		<table border="1">
  <thead>
      <tr>
      <th>Course ID</th>
      <th>Course Name</th>
      <th>Select</th>
    </tr>
  </thead>
  <tbody>
   
    <?php 
    
     
    
    include('database.php');
    $tid=$_SESSION['tid'];
$sql1 = mysqli_query($con,"SELECT * FROM `teacher` WHERE tid='$tid'");
    $res1 = mysqli_fetch_array($sql1);
    $dno=$res1['dno'];
     
    $sql = mysqli_query($con,"SELECT * FROM `course` WHERE dno='$dno'");
    while ($res = mysqli_fetch_array($sql)) 
    {
	    	$_SESSION['cid']=$res['cid'];
	    	
      echo'
      <tr>
      <td>'.$res['cid'].'</td>
      
      <td>'.$res['cname'].'</td>
      
      

      <td><a href="next.php?cid='.$res['cid'].'">SELECT</a></td>
        
      </tr>
      ';
      
     }
  
      ?>
  </tbody>
</table>
	</form>

</body>
</html>