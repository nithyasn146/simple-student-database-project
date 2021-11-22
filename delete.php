<?php
   //included db connecton file
   include('dbconnect.php');
   
   $studentId = $_POST['sId'];
  // $sqlQuery = "delete FROM tblStudent as stu LEFT JOIN tblfees as fees ON stu.studentID=fees.studentID where stu.studentID=".$studentId;
   $sqlQuery = "delete FROM tblfees where studentID=".$studentId;
   $result = mysqli_query($mysqli,$sqlQuery);
   
   $sqlQuery = "delete FROM tblStudent where studentID=".$studentId;
   $result1 = mysqli_query($mysqli,$sqlQuery);
   
   if($result && $result1)
	   $msg = "Deleted Successfully";
   else
	   $msg = "Error: Record not deleted";
   
   echo $msg;
?>