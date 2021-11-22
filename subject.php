<?php
   //included db connecton file
   include('dbconnect.php');
   
   $courseId = $_POST['cId'];
   $sqlQuery = "SELECT * FROM tblSubjects where courseID=".$courseId;
   $result = mysqli_query($mysqli,$sqlQuery);
   $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $option='<option value="">Select</option>';
   foreach($res as $reslt) { 
     $option.= '<option value="'.$reslt['subjectID'].'">'.$reslt['subjectName'].'</option>';
   }
   echo $option;
   ?>