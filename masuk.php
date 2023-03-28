<?php

@include 'user_database.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['pass']);
   $user_type = $_POST['user_type'];
   $name = $_POST['name'];
   $category = $_POST['category'];
   $description = $_POST['description'];
   $ingredients = $_POST['ingredients'];
   $img = $_POST['img'];
   $price = $_POST['price'];
   $nutrition = $_POST['nutrition'];
   $scan = $_POST['scan'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && pass = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $insert = "INSERT INTO food_data (name, category, description, ingredients, img, price, nutrition, scan) VALUES('$name','$category','$description','$ingredients','$img','$price','$nutrition','$scan')";
         mysqli_query($conn, $insert);
         header('location:papar.php');

      }elseif($row['user_type'] == 'user'){
        
         $_SESSION['user_name'] = $row['name'];
         $error[] = 'You are not allowed to edit!';

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }
 
   // Retrieve food data from database
   $sql = "SELECT * FROM food_data";
   $result = mysqli_query($conn, $sql);

   // Create array to store food data
   $food = array();

   // Loop through result set and add each row to $food array
   while ($row = mysqli_fetch_assoc($result)) {
      $food[] = $row;
   }

   // Encode $food array as JSON and output to client
   header('Content-Type: application/json');
   echo json_encode($food);

   // Close database connection
   mysqli_close($conn);

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin.css">

   <!-- include food data JavaScript file -->
   <script src="food_item.js"></script>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Admin Panel</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="pass" required placeholder="Enter your password">
      <input type="text" name="name" required placeholder="Enter food name">
      <input type="text" name="category" required placeholder="Enter food category">
      <input type="text" name="description" required placeholder="Enter description">
      <input type="text" name="ingredients" required placeholder="Enter food ingredients">
      <input type="file" id="myfile" name="img">
      <input type="number" name="price" required placeholder="Enter food price">
      <input type="text" name="nutrition" required placeholder="Enter food nutriton">
      <input type="file" id="myfile" name="scan">
      <input type="submit" name="submit" value="add now" class="form-btn">
      <br>  
      <div align="centre">[ <a href="papar.php"]><strong>Display Data</strong></a> |
      <a href="admin_page.php"><strong>Home</strong></a> |
      <a href="masuk.php"><strong>Add New Data</strong></a> ] </div></form>
   </form>

</div>

</body>
</html>
