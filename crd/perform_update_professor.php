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
   header("Location: error_page.html");
   exit();
}

$pid = $_POST['pid'];
$fname = $_POST['fname'];
$mi = $_POST['mi'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$dname = $_POST['dname'];




$sql = "SELECT DepartmentID FROM Department WHERE DepartmentName = '".$dname."';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($rows = $result->fetch_assoc()){
         $did = $rows['DepartmentID'];
        // echo $did;
         }
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   header("Location: error_page.html");
   exit();
}
      



$sql = "UPDATE Professor SET DepartmentID = ".$did.", FirstName = '".$fname."', MI = '".$mi."',LastName = '".$lname."', Email =  '".$email."' WHERE ProfessorID = ".$pid.";";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
    header("Location: update_successful.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
</body>
</html>


