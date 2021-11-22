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


// define variables and set to empty values
 $msg = "";

$sID = $_REQUEST['sID'];
//Getting course
   $courseQuery = "SELECT * FROM tblCourse";
   $resCourse = mysqli_query($mysqli,$courseQuery);
   $course = mysqli_fetch_all($resCourse, MYSQLI_ASSOC);
   //print_r($course);
  
//Getting student details
   $stdQuery = "SELECT * 
FROM tblStudent as stu 
LEFT JOIN tblfees as fees ON stu.studentID=fees.studentID where stu.studentID=".$sID;
   $resStu = mysqli_query($mysqli,$stdQuery);
   $stuRes = mysqli_fetch_assoc($resStu);
   //print_r($stuRes);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $fname = $_POST["fname"];
	$gender = $_POST["gender"];
	$dob = $_POST["dob"];
	$city = $_POST["city"];
	$course = $_POST["course"];
	$fees = $_POST["fees"];
   $sqlQuery = "update tblStudent set studentName = '$name', studentFatherName='$fname', dob='$dob', Gender='$gender',studentLocation='$city', 
   courseID=$course where studentID = ".$sID;
   $result = mysqli_query($mysqli,$sqlQuery);
   
   $sqlfees = "update tblfees set feesPaid='$fees' where studentID = ".$sID;
   $result1 = mysqli_query($mysqli,$sqlfees);
   if($result && $result1){
	   $msg = "Updated successfully";
	   //header("Location: list.php");
   }
}

?>
<div>
<h2>Edit Student</h2>
<p><span class="error"><?php echo $msg;?></span></p>
<div><a href="list.php" id="edit">View Student list</a></div><br>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Student Name: <input type="text" name="name" value="<?php echo $stuRes['studentName'];?>">
 <br><br>
  
  Father Name: <input type="text" name="fname" value="<?php echo $stuRes['studentFatherName'];?>">
  <br><br>
  Gender:
  <input type="radio" name="gender" value="Male" <?php if (isset($stuRes['Gender']) && $stuRes['Gender']=="Male") echo "checked";?>>Male
  <input type="radio" name="gender" value="Female" <?php if (isset($stuRes['Gender']) && $stuRes['Gender']=="Female") echo "checked";?>>Female
 <br><br>
  <?php echo "test: ".$stuRes['Gender'];?>
  Date of Birth: <input type="text" name="dob" value="<?php echo $stuRes['dob'];?>">(Ex: yyyy/mm/dd)
  <br><br>
  City: <input type="text" name="city" value="<?php echo $stuRes['studentLocation'];?>">
 <br><br>
  Course: <select name="course" id="course">
              <option>Select</option>
			  <?php foreach($course as $cres) { ?>
			  <option value="<?php echo $cres['courseID'];?>" <?php if ($stuRes['courseID']==$cres['courseID']) echo "selected";?>><?php echo $cres['courseName'];?></option>
			  <?php } ?>
			  
          </select>
  <br><br>
  Fess: <input type="text" name="fees" value="<?php echo $stuRes['feesPaid'];?>">
  <br><br>
  <input type="hidden" name="sID" value="<?php echo $sID?>">  
  <input type="submit" name="submit" value="Submit">  
</form>
</div>
</body>
</html>