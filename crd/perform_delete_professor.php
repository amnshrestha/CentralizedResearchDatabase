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

$pid = $_GET['pid'];
echo $pid;

$sql = "DELETE FROM Professor WHERE ProfessorID =".$pid.";";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record deleted successfully";
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


