<?php 
session_start();
      if(!isset($_SESSION['aid'])){
      header("Location: admin.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Staff</title>
</head>
<body>
  <?php 
  $check=$_SESSION['dno'];
    if ($check == "1") {
      $dno = "CSE";
    }
    elseif ($check == "2") {
      $dno = "EEE";
    }
    elseif ($check == "3") {
      $dno = "ECE";
    }
    elseif ($check == "4") {
      $dno = "MEE";
    }
    elseif ($check == "5") {
      $dno = "CIV";
    }
    elseif ($check == "6") {
      $dno = "OTHER";
    } ?>
	<div>
		<form method="post">
			<label>Enter the name of Course</label>
			<input type="text" name="name" readonly value="<?php echo $_SESSION['name'] ?>"><br>
			<label>Enter the department name</label>
			<input name="department" readonly value="<?php echo  $dno ?>"><br>
			<hr>
			<table border="1">
  <thead>
      <tr>
      <th>Staff ID</th>
      <th>Staff Name</th>
      <th>Select</th>
    </tr>
  </thead>
  <tbody>
    <a href=""></a>
    <?php 
    
     
    
    include('database.php');

    
     $dn2= $_SESSION['dno'];
    $sql = mysqli_query($con,"SELECT * FROM `teacher` WHERE dno='$dn2'");
    while ($res = mysqli_fetch_array($sql)) 
    {
      echo'
      <tr>
      <td>'.$res['tid'].'</td>
      
      <td>'.$res['tname'].'</td>
      
      

      <td><a href="select.php?tid='.$res['tid'].'">SELECT</a></td>
        
      </tr>
      ';
      
     }
  
      ?>
  </tbody>
</table>
	
		</form>


			
</body>
</html>