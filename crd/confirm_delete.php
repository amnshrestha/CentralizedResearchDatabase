<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="form8.css">
<script src="form8.js"></script>
</head>
<body>
<?php
$did = $_GET['did'];
?>

<div class="title">Delete Record</div>
<div class="line"></div>
<div class="image"><img src="uorImage.png"></div>

<div class="form-style-8">

Are you sure you want to delete the record with DepartmentID: <?php echo $did?>
<br><br><br>
<a href="perform_delete.php?did=<?php echo $did ?>"><button type="button" class="buttonDesign">Confirm</button></a>
</body>
</html>


