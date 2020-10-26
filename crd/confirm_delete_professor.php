<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="form8.css">
<script src="form8.js"></script>
</head>
<body>
<?php
$pid = $_GET['pid'];
?>

<div class="title">Delete Record</div>
<div class="line"></div>
<div class="image"><img src="uorImage.png"></div>

<div class="form-style-8">

Are you sure you want to delete the Professor with ProfessorID: <?php echo $pid?>
<br><br><br>
<a href="perform_delete_professor.php?pid=<?php echo $pid ?>"><button type="button" class="buttonDesign">Confirm</button></a>
</body>
</html>



