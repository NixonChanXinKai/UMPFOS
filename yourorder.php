<!-- paparorder.php -->
<!-- To display all information of database. -->
<html>
<head>
<title>Your Order</title>
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
    padding-left: 281px;
    padding-right: 10px;
    color: darkred;
  }
  td1 {
    padding-left: 80px;
  }
</style>
</head>

<body background-color="#FFFFFF" text="#000000">
<ol>
<h1 align="center">Your Order Details</h1>
<?php
include("user_database.php");

$query = "SELECT * FROM orders WHERE ";
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
    $id = $row["id"];
	$name = $row["name"];
	$quantity = $row["quantity"];
	$phonenumber = $row["phonenumber"];
    $pickuppoint = $row["pickuppoint"];

	?>
	<table>
  <tr>
    <td><strong>Food Name: &nbsp;</strong></td>
    <td><?php echo $name; ?></td>
  </tr>
  <tr>
    <td><strong>Quantity: &nbsp;</strong></td>
    <td><?php echo $quantity; ?></td>
  </tr>    
  <tr>
    <td><strong>Phone Number: &nbsp;</strong></td>
    <td><?php echo $phonenumber; ?></td>
  </tr>
  <tr>
    <td><strong>Pickup Point: &nbsp;</strong></td>
    <td><?php echo $pickuppoint; ?></td>
  </tr>
</table>
  <p align="center"><strong>Action: </strong><a href="customerbuangorder.php?id=<?php echo $id; ?>"><strong>Delete</strong></a></p><br>
	<?php
    }
} else {
    echo "0 results";

}
?>
</ol>
<div align="center">[ <a href="user_page.php"><strong>Home</strong></a> ] </div>

</body>
</html>
