<!--kemaskini.php-->
<!--To update data of ubah.php into database.-->
<?php
include ("user_database.php");

extract ($_POST);

$query = "UPDATE food_data SET name = '$name', category = '$category', description = '$description', ingredients = '$ingredients', price = '$price', img = '$img', nutrition = '$nutrition', scan = '$scan' WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die ("Could not execute query in ubah.php");
if($result){
 echo "<script type = 'text/javascript'> window.location='papar.php' </script>";
}
?>