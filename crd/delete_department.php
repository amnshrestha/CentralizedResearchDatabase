<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');
$sql = "USE ashrest2_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
   header("Location: error_page.html");
   exit();
}
// Query:

$did = $_POST['did'];
$dname = $_POST['dname'];

$foundsomething = 0;
$sql = "SELECT * FROM Department";


if(!empty($did)){
  if($foundsomething == 0){
          $foundsomething = 1;
          $sql = $sql." WHERE DepartmentID = ".$did;
  }else{
    $sql = $sql." and DepartmentID = ".$did;
  }
}

if($dname != "Any") {
  if($foundsomething == 0){
          $foundsomething = 1;
          $sql = $sql." WHERE DepartmentName = '".$dname."'";
  }else{
    $sql = $sql." and DepartmentName = '".$dname."'";
  }

}


//$sql = "SELECT * FROM Professor";
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
         <th>DepartmentID</th>
         <th>DepartmentName</th>
         <th>NoOfResearch</th>
         <th>NoOfCitations</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['DepartmentID']?></td>
          <td><?php echo $row['DepartmentName']?></td>
          <td><?php echo $row['NoOfResearch']?></td>
          <td><?php echo $row['NoOfCitations']?></td>
          <td><a href="confirm_delete_department.php?did=<?php echo $row['DepartmentID'] ?>" class = "buttonDesign"><button type="button" class="buttonDesign">Delete</button></a></td>
      </tr>

<?php
}
}
else {
echo "Nothing to display";
}
?>

    </table>

<?php
$conn->close();
?>

</body>
</html>



