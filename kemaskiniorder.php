<!--kemaskini.php-->
<!--To update data of ubah.php into database.-->
<?php
include ("user_database.php");

extract ($_POST);

$query = "UPDATE orders SET name = '$name', quantity = '$quantity', phonenumber = '$phonenumber' WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die ("Could not execute query in ubahorder.php");
if($result){
 echo "<script type = 'text/javascript'> window.location='paparorder.php' </script>";
}
?>