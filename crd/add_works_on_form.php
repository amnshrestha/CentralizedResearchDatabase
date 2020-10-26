
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

$sql = "SELECT FirstName,MI,LastName,ProfessorID FROM Professor;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   header("Location: error_page.html");
   exit();
}

$sql = "SELECT Title FROM research;";
$resultTitle = $conn->query($sql);
if ($resultTitle->num_rows > 0) {
    //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
   header("Location: error_page.html");
   exit();
}

?>
<div class="title">Assign Professor</div>
<div class="line"></div>
<div class="image"><img src="uorImage.png"></div>

<div class="form-style-8">
<form action="add_works_on.php" method="post">
   Professor: <select name = "pname">
        <?php
	while($rows = $result->fetch_assoc()){
          $pname = $rows['FirstName']." ".$rows['MI']." ".$rows['LastName']." (".$rows['ProfessorID'].")";
          echo"<option value='$pname'>$pname</optoin>";
         }
	
        ?>
	</select>
  Research Title: <select name = "rtitle">
        <?php
  while($rows = $resultTitle->fetch_assoc()){
          $rtitle = $rows['Title'];
          echo"<option value='$rtitle'>$rtitle</optoin>";
         }
  
        ?>
  </select>
  

   <input type="submit" class = "buttondesign">
</form>
</div>
</body>
</html>
