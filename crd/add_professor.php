<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');
$sql = "USE ashrest2_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
   header("Location: error_page.html");
   exit();

}
// Query:
$pid = $_POST['pid'];
$dname = $_POST['dname'];
$fname = $_POST['fname'];
$mi = $_POST['mi'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$did=0;

	echo "searching for ".$dname;
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

//echo "Found".$did;
     
$sql = "INSERT INTO Professor values ($pid,$did,'$fname','$mi','$lname','$email');";


#$sql = "SELECT * FROM Department where Username like 'amai2';";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
    header("Location: add_successful.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: error_page.html");
    exit();
}
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>

<?php
$conn->close();
?>

</body>
</html>





