<!-- ubahorder.php -->
<!-- Interface of update data. -->

<?php
include("user_database.php");

$idURL = $_GET['id'];

$query = "SELECT * FROM orders WHERE id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in ubah.php");
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$quantity = $row['quantity'];
$phonenumber = $row['phonenumber'];
$pickuppoint = $row['pickuppoint'];

//@mysql_free_result($result);
?>
<html>
<head>
<title>Edit Order</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <!-- custom css file link  -->
 <link rel="stylesheet" href="css/admin.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#price,#quantity").keyup(function(){

            var total =0;
            var x = Number($("#price").val());
            var y = Number($("#quantity").val());
            var total = x * y;

            $("#totalprice").val(total);
        });
    });
</script>
</head>

<div class="form-container">

<form method="post" action="kemaskiniorder.php">
      <h3>Update Order Panel</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

      <input type="text" name="name" required placeholder="Enter food name" value="<?php echo $name; ?>">
      <input type="number" id="quantity" name="quantity" required placeholder="How many do you want to order?" value="<?php echo $quantity; ?>">
      <input type="number" id="price" name="price" required placeholder="Food Price" value="<?php echo $price ?>">
      <input type="tel" name="phonenumber" required placeholder="Enter customer phone number" value="<?php echo $phonenumber; ?>">
      <input type="text" name="pickuppoint" required placeholder="Customer pickup point">
      Total Price: RM&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="number" id="totalprice" disabled>
      <input type ="hidden" name="id" value="<?php echo $idURL; ?>">
      <br><input type ="submit" value="Update" class="form-btn">
      <input type ="reset" value="Reset" class="form-btn">
<br>  
<div align="centre">[ <a href="papar.php"]><strong>Display Data</strong></a> |
<a href="admin_page.php"><strong>Home</strong></a> ] </div></form>
</body>
</html>