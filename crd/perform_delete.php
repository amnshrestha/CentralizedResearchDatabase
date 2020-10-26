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

$did = $_GET['did'];
echo $did;

$sql = "DELETE FROM Department WHERE DepartmentID =".$did.";";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
    header("Location: delete_successful.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   header("Location: error_page.html");
   exit();
}


?>
</body>
</html>

