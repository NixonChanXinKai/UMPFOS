<!-- papar.php -->
<!-- To display all information of database. -->
<html>
<head>
<title>Data Display</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <!-- custom css file link  -->
 <link rel="stylesheet" href="css/admin.css">
 <style>
  h1{
    color: darkred;
    font-size: large
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }
  h3{
    padding-left: 80px;
  }
  td {
    color: darkred;
  }
  td1 {
    padding-left: 80px;
  }
</style>
</head>

<body background-color="#FFFFFF" text="#000000">
<ol>
<h1 align="center">Data of Food & Beverage</h1>
<?php
include("user_database.php");

$query = "SELECT * FROM food_data";
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
    $id = $row["id"];
	$name = $row["name"];
	$category = $row["category"];
	$description = $row["description"];
	$ingredients = $row["ingredients"];
	$price = $row["price"];
	$img = $row["img"];
	$nutrition = $row["nutrition"];
	$scan = $row["scan"];

	?>
	<table>
  <tr>
   <strong style="padding-left: 314px; padding-right:314px"></strong></td><img style="padding-left: 10px; padding-right: 10px" src="<?php echo $img; ?>" alt="<?php echo $name; ?>" width="250" height="250"></tr>
  </tr>
  <tr>
    <td align="center"><strong>Name: &nbsp;</strong></td>
    <td align="center" colspan="2"><?php echo $name; ?></td>
  </tr>
  <tr>
    <td align="center"><strong>Category: &nbsp;</strong></td>
    <td align="center" colspan="2"><?php echo $category; ?></td>
  </tr>    
  <tr>
    <td align="center"><strong>Description: &nbsp;</strong></td>
    <td align="center" colspan="2"><?php echo $description; ?></td>
  </tr>
  <tr>
    <td align="center"><strong>Ingredients: &nbsp;</strong></td>
    <td align="center" colspan="2"><?php echo $ingredients; ?></td>
  </tr>
  <tr>
    <td align="center"><strong>Price: &nbsp;</strong></td>
    <td align="center" colspan="2">RM<?php echo $price; ?></td>
  </tr>
  <tr>
    <td align="center"><strong>Nutrition Facts: &nbsp;</strong></td>
    <td align="center" colspan="2"><?php echo $nutrition; ?></td>
  </tr>
</table>
<tr>
   <strong style="padding-left: 348px; padding-right:348px"></strong></td><img style="padding-left: 10px; padding-right: 10px" src="<?php echo $scan; ?>" width="120" height="120"></tr>
  </tr>
  <p align="center"><strong>Action: </strong><a href="ubah.php?id=<?php echo $id; ?>"><strong>Edit</strong></a> /  <a href="buang.php?id=<?php echo $id; ?>"><strong>Delete</strong></a></p><br>
	<?php
    }
} else {
    echo "0 results";

}
?>
</ol>
<div align="center">[ <a href="admin_page.php"><strong>Home</strong></a> |
<a href="masuk.php"><strong>Add New Data</strong></a> ] </div>

</body>
</html>
