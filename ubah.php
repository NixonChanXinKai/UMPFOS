<!-- ubah.php -->
<!-- Interface of update data. -->

<?php
include("user_database.php");

$idURL = $_GET['id'];

$query = "SELECT * FROM food_data WHERE id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in ubah.php");
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$category = $row['category'];
$decription = $row['description'];
$ingredients = $row['ingredients'];
$price = $row['price'];
$img  = $row['img'];
$nutrition = $row['nutrition'];
$scan  = $row['scan'];

//@mysql_free_result($result);
?>
<html>
<head>
<title>UMP FOS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <!-- custom css file link  -->
 <link rel="stylesheet" href="css/admin.css">
</head>

<div class="form-container">

<form method="post" action="kemaskini.php">
      <h3>Update Panel</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter food name" value="<?php echo $name; ?>">
      <input type="text" name="category" required placeholder="Enter food category" value="<?php echo $category; ?>">
      <input type="text" name="description" required placeholder="Enter description" value="<?php echo $decription; ?>">
      <input type="text" name="ingredients" required placeholder="Enter food ingredients" value="<?php echo $ingredients; ?>">
      <input type="file" id="myfile" name="img">
      <input type="number" name="price" required placeholder="Enter food price" value="<?php echo $price; ?>">
      <input type="text" name="nutrition" required placeholder="Enter food nutrition" value="<?php echo $nutrition; ?>">
      <input type="file" id="myfile" name="scan">
      <input type ="hidden" name="id" value="<?php echo $idURL; ?>">
      <br><input type ="submit" value="Update" class="form-btn">
      <input type ="reset" value="Reset" class="form-btn">
<br>  
<div align="centre">[ <a href="papar.php"]><strong>Display Data</strong></a> |
<a href="admin_page.php"><strong>Home</strong></a> ] </div></form>
</body>
</html>