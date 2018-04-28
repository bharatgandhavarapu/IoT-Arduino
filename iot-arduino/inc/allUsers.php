<?php
	include '../config.php';
	include 'maindashboard.php';
?>

<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  table { 
    width: 40%;
    margin: 40px auto;
    border-collapse: collapse; 
  }
  /* Zebra striping */
  tr:nth-of-type(odd) { 
    background: #eee; 
  }
  th { 
    background: #333; 
    color: white; 
    font-weight: bold; 
  }
  td, th { 
    padding: 6px; 
    border: 1px solid #ccc; 
    text-align: left; 
  }
  </style>
</head>
<body>
  <br><br>
  <p class="pCenter">
    List of users in the database.
  </p><br><br>
  <h2 class="h2">All Users</h2>
	<table>   
    <tr>  
      <th>User Id</th>  
      <th>User Name</th>  
      <th>User E-mail</th>
    </tr>

    <?php

      $count = 0;

    	$sql="select * from user where !(uid = 'admin') ";//select query for viewing users.  
    	$res=$conn->query($sql);//here run the sql query.  

    	while($row=mysqli_fetch_array($res))//while look to fetch the result and store in a array $row.  
    	{
        $user_id = $count++;
    	  $user_name=$row[0];  
    	  $user_email=$row[1]; 
    ?>  

    <tr>
      <td><?php echo $count; ?></td>
      <td><?php echo $user_name;  ?></td>  
      <td><?php echo $user_email;  ?></td> 
      <!--<td><a href="delete.php?del=<?php //echo $user_id ?>"><button class="btn">Delete</button></a></td>-->
    </tr>  
  
    <?php } ?>  
  
  </table> 
</body>
</html>