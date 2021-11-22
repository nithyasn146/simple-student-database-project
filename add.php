<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>

</head>
<body>  

<?php
//included db connecton file
include('dbconnect.php');

$msg = '';
//Getting course
   $courseQuery = "SELECT * FROM tblCourse";
   $resCourse = mysqli_query($mysqli,$courseQuery);
   $course = mysqli_fetch_all($resCourse, MYSQLI_ASSOC);
  // print_r($course);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$sno = $_POST["sno"];
	$name = $_POST["name"];
    $fname = $_POST["fname"];
	$gender = $_POST["gender"];
	$dob = $_POST["dob"];
	$city = $_POST["city"];
	$course = $_POST["course"];
	$fees = $_POST["fees"];
   $sqlQuery = "INSERT INTO tblStudent (studentID, studentName, studentFatherName, dob, Gender,studentLocation, courseID)
VALUES ($sno, '$name', '$fname', '$dob', '$gender', '$city',$course);";
//print $sqlQuery;
   $result = mysqli_query($mysqli,$sqlQuery);
   
   $sqlfees = "INSERT INTO tblfees (studentID, feesPaid) VALUES ($sno,$fees)";
   $result1 = mysqli_query($mysqli,$sqlfees);
   if($result && $result1){
	   $msg = "Inserted successfully";
	   //header("Location: list.php");
   }
}
?>

<h2>Add Student</h2>
<p><span class="error"><?php echo $msg;?></span></p>
<div><a href="list.php" id="edit">View Student list</a></div><br>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
Roll Number: <input type="text" name="sno" value="">
  <br><br>
  
  Student Name: <input type="text" name="name" value="">
  <br><br>
  
  Father Name: <input type="text" name="fname" value="">
 <br><br>
  Gender:
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="Female" checked>Female
  <br><br>
  Date of Birth: <input type="text" name="dob" value="">(Ex: yyyy/mm/dd)
  <br><br>
  City: <input type="text" name="city" value="">
  <br><br>
  Course: <select name="course" id="course">
              <option>Select</option>
			  <?php foreach($course as $cres) { ?>
			  <option value="<?php echo $cres['courseID'];?>"><?php echo $cres['courseName'];?></option>
			  <?php } ?>
			  
          </select>
  <br><br>
  Fees: <input type="number" name="fees" value="">
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>