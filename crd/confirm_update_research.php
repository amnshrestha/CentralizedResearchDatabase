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



$title  = $_GET['title'];
$n_researcher = $_GET['n_researcher'];
$vacancy = $_GET['vacancy'];
$funding = $_GET['funding'];
$startD  = $_GET['startD'];
$endD = $_GET['endD'];
$c_email = $_GET['c_email'];
$c_position = $_GET['c_position'];

?>



<div class="title">Update Research</div>
<div class="line"></div>
<div class="image"><img src="uorImage.png"></div>

<div class="form-style-8">
<form action="perform_update_research.php" method="post">

   Title: <input type="text" name="title" value="<?php echo $title?>" readonly><br><br>
   No_of_researchers:  <input type="number" name="n_researcher" value=<?php echo $n_researcher?>><br>
   Vacancy:  <input type="number" name="vacancy" value = <?php echo $vacancy?>><br>
   Funding:  <input type="number" name="funding" value = <?php echo $funding?>><br>
   StartDate: <input type="date" name="startD" value=<?php echo $startD?>><br>
   EndDate:  <input type="date" name="endD" value=<?php echo $endD?>><br>
   Contact_email:  <input type="text" name="c_email" value = <?php echo $c_email?>><br>
   Contact_position:  <input type="text" name="c_position" value = <?php echo $c_position?>><br>

   <input type="submit" class = "buttondesign">
</form>
</div>
</body>
</html>



