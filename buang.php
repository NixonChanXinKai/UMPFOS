<!-- buang.php -->
<!-- To delete one particular data. -->

<?php

include ("user_database.php");

$idURL = $_GET['id'];

$query = "DELETE FROM food_data WHERE id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in ubah.php");

if($result){
echo "<script type= 'text/javascript'> window.location='papar.php'</script>";
}
?>