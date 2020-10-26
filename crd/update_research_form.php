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

$sql = "SELECT Title FROM research;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   header("Location: error_page.html");
   exit();
}

?>
<div class="title">Update Research</div>
<div class="line"></div>
<div class="image"><img src="uorImage.png"></div>

<div class="form-style-8">
<form action="update_research.php" method="post">
  
   Research title:  <select name = "title">
        <?php
        while($rows = $result->fetch_assoc()){
          $title = $rows['Title'];
          echo"<option value='$title'>$title</optoin>";
         }
  ?>
  </select>

   <input type="submit" class = "buttondesign">
</form>
</div>
</body>
</html>

