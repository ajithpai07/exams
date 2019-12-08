<?php 
session_start();
      if(!isset($_SESSION['sid'])){
      header("Location: student.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
</head>
<body>

<div>
	<form method="post">
		<p style="float:right">
		<a href="logout.php">LOGOUT</a>
		</p>

		
	
		
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

    
     $dno=$_SESSION['dno'];
    $sql = mysqli_query($con,"SELECT * FROM `course` WHERE dno='$dno'");
    while ($res = mysqli_fetch_array($sql)) 
    {
      echo'
      <tr>
      <td>'.$res['cid'].'</td>
      
      <td>'.$res['cname'].'</td>
      
      

      <td><a href="take.php?cid='.$res['cid'].'">Take test</a></td>
        
      </tr>
      ';
      
     }
  
      ?>
  </tbody>
</table>
	
	</form>
</div>

</body>
</html>