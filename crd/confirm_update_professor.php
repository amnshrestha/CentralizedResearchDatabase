<html>
<head>
<link rel="stylesheet" href="form8.css">
<script src="form8.js"></script>

</head>
<body>
<?php
require_once('db_setup.php');
$sql = "USE ashrest2_1;";
if ($conn->query($sql) === TRUE) {
    //echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}

$sql = "SELECT DepartmentName FROM Department;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT distinct Title FROM Works_on;";
$result2 = $conn->query($sql);
if ($result2->num_rows > 0) {

}
else{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$pid  = $_GET['pid'];
$fname = $_GET['fname'];
$mi = $_GET['mi'];
$lname = $_GET['lname'];
$email = $_GET['email'];


$did  = $_GET['did'];
$title  = $_GET['title'];

$dnameSelected = "";

$sqlDepartment = "SELECT DepartmentName FROM Department WHERE DepartmentID = ".$did.";";
$resultsqlDepartment = $conn->query($sqlDepartment);
if ($resultsqlDepartment->num_rows > 0) {
  while($rows = $resultsqlDepartment->fetch_assoc()){
          $dnameSelected = $rows['DepartmentName'];
         }
}
else{
  echo "Error: " . $sqlDepartment . "<br>" . $conn->error;
}

?>



<div class="title">Update Professor</div>
<div class="line"></div>
<div class="image"><img src="uorImage.png"></div>

<div class="form-style-8">
<form action="perform_update_professor.php" method="post">

   ProfessorID: <input type="text" name="pid" value=<?php echo $pid?> readonly><br><br>
   DepartmentName:  <select name = "dname">
        <?php
	echo"<option value='$dname'>$dname</optoin>";
        while($rows = $result->fetch_assoc()){
          $dname = $rows['DepartmentName'];
          if($dname === $dnameSelected){
            echo"<option value='$dname' selected>$dname</optoin>";
          }else{
            echo"<option value='$dname'>$dname</optoin>";
          }
         }
  ?>
  </select>
   FirstName:  <input type="text" name="fname" value = "<?php echo $fname?>"><br>
   MI:  <input type="text" name="mi" value = <?php echo $mi?>><br>
   LastName:  <input type="text" name="lname" value = "<?php echo $lname?>"><br>
   Email:  <input type="text" name="email" value = "<?php echo $email?>"><br>


   <input type="submit" class = "buttondesign">
</form>
</div>
</body>
</html>



