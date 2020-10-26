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

$title  = $_POST['title'];
$n_researcher = $_POST['n_researcher'];
$vacancy = $_POST['vacancy'];
$funding = $_POST['funding'];
$startD  = $_POST['startD'];
$endD = $_POST['endD'];
$c_email = $_POST['c_email'];
$c_position = $_POST['c_position'];


$sql = "UPDATE research SET No_of_researchers = '".$n_researcher."', Vacancy = '".$vacancy."', Funding = '".$funding."', StartDate = '".$startD."', EndDate = '".$endD."', Contact_email = '".$c_email."', Contact_position = '".$c_position."' WHERE Title = '".$title."';";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
    header("Location: update_successful.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   header("Location: error_page.html");
   exit();
}


?>
</body>
</html>


