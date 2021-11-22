<?php
   //included db connecton file
   include('dbconnect.php');
   
   $studentName = $_POST['studentName'];
   
    $sqlQuery = "SELECT * 
FROM tblStudent as stu 
LEFT JOIN tblcourse as cou
      ON stu.courseID=cou.courseID
LEFT JOIN tblfees as fee
      ON stu.studentID=fee.studentID where studentName LIKE '%".$studentName."%'";
	  
   $result = mysqli_query($mysqli,$sqlQuery);
   $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($res as $reslt) { ?>
	<tr>
    <td><?php echo $reslt['studentID']; ?> </td>
	<td><?php echo $reslt['studentName']; ?> </td>
	<td><?php echo $reslt['studentFatherName']; ?> </td>
	<td><?php echo $reslt['dob']; ?> </td>
	<td><?php echo $reslt['Gender']; ?> </td>
	<td><?php echo $reslt['studentLocation']; ?> </td>
	<td><?php echo $reslt['courseName']; ?> </td>
	<td><?php echo $reslt['feesPaid']; ?> </td>
	<td><a href="edit.php?sID=<?php echo $reslt['studentID'];?>" id="edit">Edit</a> </td>
	<td><a href="javascript:" id="delete" onclick="delStudent(<?php echo $reslt['studentID'];?>)">Delete</a></td>
  </tr>
 <?php     
	}
?>