<!DOCTYPE HTML>  
<html>
<head>
<style>
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            //$(document).ready(function(){
            
                function delStudent(studentId){
					//var r = confirm("Press a button!");
					if (confirm("Are you want delete this record: "+studentId)) {
						//Ajax for calling php function
						$.post('delete.php', { sId: studentId }, function(data){
						   // alert('ajax completed. Response:  '+data);
							alert(data);
							window.location.href = "list.php";
						});
					}
				}
       // });
	   
	   function getInfo(stuName) {
			$.post('search.php', { studentName: stuName }, function(data){
			   // alert('ajax completed. Response:  '+data);
				alert(data);
				$('#dataResult').html(data);
			});
         };
        </script>
</head>
<body>  

<?php
//included db connecton file
include('dbconnect.php');?>

<h3>Listing Student Details</h3>
<div><a href="add.php" id="edit">Add Student</a>&nbsp;&nbsp;&nbsp;Search By Name <input type="text" name="search"></div><br>
<table border="1">
<tr>
   <th>SNo</th>
   <th>Student Name</th>
   <th>Father Name</th>
   <th>DOB</th>
   <th>Gender</th>
   <th>City</th>
   <th>Course Name</th>
   <th>Fees Paid</th>
</tr>
<div id='dataResult'>
<?php

   $sqlQuery = "SELECT * 
FROM tblStudent as stu 
LEFT JOIN tblcourse as cou
      ON stu.courseID=cou.courseID
LEFT JOIN tblfees as fee
      ON stu.studentID=fee.studentID";
   $result = mysqli_query($mysqli,$sqlQuery);
   $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
  // print_r($res);
  
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
</div>
</table>

</body>
</html>