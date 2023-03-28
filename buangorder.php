<!-- buangorder.php -->
<!-- To delete one particular data. -->

<?php

include ("user_database.php");

$idURL = $_GET['id'];

$query = "DELETE FROM orders WHERE id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in ubahorder.php");

if($result){
echo "<script type= 'text/javascript'> window.location='paparorder.php'</script>";
}
?>