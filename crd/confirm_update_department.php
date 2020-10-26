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

$did  = $_GET['did'];
$dname = $_GET['dname'];
$n_research = $_GET['n_research'];
$n_citation = $_GET['n_citation'];

?>



<div class="title">Update Department</div>
<div class="line"></div>
<div class="image"><img src="uorImage.png"></div>

<div class="form-style-8">
<form action="perform_update_department.php" method="post">

   DepartmentID: <input type="text" name="did" value=<?php echo $did?> readonly><br><br>
   DepartmentName:  <input type="text" name="dname" value="<?php echo $dname?>"><br>
   NoOfResearch:  <input type="number" name="n_research" value = <?php echo $n_research?>><br>
   NoOfCitations:  <input type="number" name="n_citation" value = <?php echo $n_citation?>><br>

   <input type="submit" class = "buttondesign">
</form>
</div>
</body>
</html>



