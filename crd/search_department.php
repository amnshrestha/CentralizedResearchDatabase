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
$title = $_POST['title'];

$foundsomething = 0;
$toCheck = "Any";
if ($title != $toCheck){
  if ($foundsomething == 0){
    $foundsomething = 1;
    $sql = "SELECT Department.DepartmentID, Department.DepartmentName, Department.NoOfResearch, Department.NoOfCitations, In_department.Title  FROM Department LEFT JOIN In_department ON Department.DepartmentID = In_department.DepartmentID WHERE Title = '".$title."' ";
  }
}
  else{
    $sql = "SELECT Department.DepartmentID, Department.DepartmentName, Department.NoOfResearch, Department.NoOfCitations, In_department.Title  FROM Department LEFT JOIN In_department ON Department.DepartmentID = In_department.DepartmentID";

  }


if(!empty($did)){
  if($foundsomething == 0){
          $foundsomething = 1;
          $sql = $sql." WHERE Department.DepartmentID = ".$did;
  }else{
    $sql = $sql." and Department.DepartmentID = ".$did;
  }
}

if($dname != $toCheck) {
  if($foundsomething == 0){
          $foundsomething = 1;
          $sql = $sql." WHERE DepartmentName = '".$dname."'";
  }else{
    $sql = $sql." and DepartmentName = '".$dname."'";
  }

}


$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
         <th>DepartmentID</th>
         <th>DepartmentName</th>
         <th>NoOfResearch</th>
         <th>NoOfCitations</th>
         <th>Research title</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['DepartmentID']?></td>
          <td><?php echo $row['DepartmentName']?></td>
          <td><?php echo $row['NoOfResearch']?></td>
          <td><?php echo $row['NoOfCitations']?></td>
          <td><?php echo $row['Title']?></td>
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

