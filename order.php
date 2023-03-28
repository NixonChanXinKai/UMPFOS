<?php
include("user_database.php");

$idURL = $_GET['id'];

// Sanitize the input to prevent SQL injection attacks
$id = mysqli_real_escape_string($conn, $idURL);

$query = "SELECT * FROM food_data WHERE id = '$id'";
$result = mysqli_query($conn, $query) or die ("Could not execute query in ubah.php");
$row = mysqli_fetch_assoc($result);

$name = htmlspecialchars($row['name']);
$price = htmlspecialchars($row['price']);
$img  = htmlspecialchars($row['img']);
$scan  = htmlspecialchars($row['scan']);

// Initialize the error array to avoid undefined variable errors
$errors = array();

if(isset($_POST['submit'])) {
  $name = htmlspecialchars($_POST['name']);
  $quantity = intval($_POST['quantity']);
  $phonenumber = htmlspecialchars($_POST['phonenumber']);
  $pickuppoint = htmlspecialchars($_POST['pickuppoint']);
  $proof = htmlspecialchars($_POST['proof']);

  if($quantity < 1){
    $errors[] = 'At least 1 item needs to be chosen!';
  }

  // Insert the order data into the "orders" table in the database
  if(empty($errors)) {
    $insert = "INSERT INTO orders (name, quantity, phonenumber, pickuppoint, proof) VALUES('$name','$quantity','$phonenumber','$pickuppoint','$proof')";
    mysqli_query($conn, $insert);
    header('Location: login_form.php');
    exit();
  }
}

?>
<html>
<head>
<title>UMP FOS</title>
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

<form action="" method="post">
  <h3>Fill in Order Details</h3>

  <?php
  if(!empty($errors)){
    foreach($errors as $error){
      echo '<span class="error-msg">'.$error.'</span>';
    }
  }
  ?>

  <tr>
    <td align="center"></td>
    <img src="<?php echo $img; ?>" alt="<?php echo $name; ?>" width="150" height="150">
  </tr>
  <input type="text" name="name" required placeholder="Enter food name" value="<?php echo $name; ?>">
  <input type="number" id="quantity" name="quantity" required placeholder="How many do you want to order?">
  <input type="hidden" id="price" name="price" required placeholder="Food Price" value="<?php echo $price ?>">
  <input type="tel" name="phonenumber" required placeholder="Enter your phone number">
  <input type="text" name="pickuppoint" required placeholder="Where to pickup your food?">
  Total Price: RM&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="number" id="totalprice" disabled>
  <img src="<?php echo $scan; ?>" width="150" height="150">
  <input type="file" id="myfile" name="proof">
  <input type ="hidden" name="id" value="<?php echo $id; ?>">
  <input type="submit" name="submit" value="Place Order" class="form-btn">
</form>
</div>
</body>
</html>
