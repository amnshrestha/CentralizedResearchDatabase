<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="form8.css">
<script src="form8.js"></script>
</head>
<body>
<?php
$title = $_GET['title'];
?>

<div class="title">Delete Record</div>
<div class="line"></div>
<div class="image"><img src="uorImage.png"></div>

<div class="form-style-8">

Are you sure you want to delete the Research with Title: <?php echo $title?>
<br><br><br>
<a href="perform_delete_research.php?title=<?php echo $title ?>"><button type="button" class="buttonDesign">Confirm</button></a>
</body>
</html>



