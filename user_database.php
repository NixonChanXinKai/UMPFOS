<!-- dbase.php -->
<!-- To connect between php scripting and database. -->
<?php

define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", "");
define("DATABASE_NAME", "user_db");
define("DATABASE_PORT", "3307");

// To establish a connection to database and save in $conn
$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME, DATABASE_PORT);

// If connection failed then dsplay mysql error
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// To select one particular database to be used
mysqli_select_db($conn,"user_db") or die( "Could not open user database");

//set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');

$query = "CREATE TABLE IF NOT EXISTS user_form (
    id INT(255) PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(255),  
    email VARCHAR(255),
    pass LONGTEXT,
    cpass LONGTEXT,
    user_type VARCHAR(255),
    special_id VARCHAR(100) UNIQUE
    )";
mysqli_query($conn, $query);

$query2 = "CREATE TABLE IF NOT EXISTS food_data (
    id INT(255) PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(255),
    category VARCHAR(255),
    rating double,
    price double,   
    img TEXT, 
    quantity INT(255),
    special_id VARCHAR(100) UNIQUE
    )";
mysqli_query($conn, $query2);

$query16 = "CREATE TABLE IF NOT EXISTS customer_membertime (
    id INT(255) PRIMARY KEY AUTO_INCREMENT ,
    special_id VARCHAR(100),
    end_date DATE
    )";
mysqli_query($conn, $query16);

$query13 = "CREATE TABLE IF NOT EXISTS customer_suspend (
    id INT(255) PRIMARY KEY AUTO_INCREMENT ,
    special_id VARCHAR(100) UNIQUE
    )";
mysqli_query($conn, $query13);

//store restaurant info
$query3 = "CREATE TABLE IF NOT EXISTS restaurant_detail (
    id INT(255) PRIMARY KEY AUTO_INCREMENT ,
    wname LONGTEXT NOT NULL,
    email VARCHAR(50),
    pword LONGTEXT,
    addres VARCHAR(50),
    city VARCHAR(50),
    negeri VARCHAR(50),
    descript LONGTEXT,
    imagen LONGTEXT,
    imagemenu LONGTEXT,
    status_type VARCHAR(50),
    resspecial_id VARCHAR(100) UNIQUE
    )";

mysqli_query($conn, $query3);

$query14 = "CREATE TABLE IF NOT EXISTS restaurant_suspend (
    id INT(255) PRIMARY KEY AUTO_INCREMENT ,
    resspecial_id VARCHAR(100) UNIQUE
    )";
mysqli_query($conn, $query14);

//store restaurant resgistration step
$query4 = "CREATE TABLE IF NOT EXISTS restaurant_register (  
    resspecial_id VARCHAR(100) PRIMARY KEY,
    step varchar(50)
    )";

mysqli_query($conn, $query4);

//store restaurant tag
$query5 = "CREATE TABLE IF NOT EXISTS restaurant_type (  
    resspecial_id VARCHAR(100) PRIMARY KEY,
    tag1 varchar(50),
    tag2 varchar(50),
    tag3 varchar(50)
    )";

mysqli_query($conn, $query5);

$query6 = "CREATE TABLE IF NOT EXISTS restaurant_tabletype (  
    resspecial_id VARCHAR(100) PRIMARY KEY,
    tabletype1 INT(100),
    tabletype2 INT(100),
    tabletype3 INT(100)
    )";

mysqli_query($conn, $query6);

$query7 = "CREATE TABLE IF NOT EXISTS restaurant_timesession (  
    resspecial_id VARCHAR(100) PRIMARY KEY,
    session1 varchar(50),
    session2 varchar(50),
    session3 varchar(50),
    session4 varchar(50),
    session5 varchar(50),
    session6 varchar(50),
    session7 varchar(50),
    session8 varchar(50)
    )";

mysqli_query($conn, $query7);

$query1 = "CREATE TABLE IF NOT EXISTS booking_detail (
    id INT(255) PRIMARY KEY AUTO_INCREMENT ,
    bdate DATE,
    bsession VARCHAR(100),
    binformation LONGTEXT,
    tabletype VARCHAR(100),
    event_discount VARCHAR(100),
    special_id VARCHAR(20),
    resspecial_id VARCHAR(20),
    book_id VARCHAR(100)
    )"; 

mysqli_query($conn, $query1);

$query9 = "CREATE TABLE IF NOT EXISTS booking_status (
    book_id VARCHAR(100) PRIMARY KEY,
    confirm_state VARCHAR(50)
    )"; 

mysqli_query($conn, $query9);

$query8 = "CREATE TABLE IF NOT EXISTS booking_count (
    id INT(255) PRIMARY KEY AUTO_INCREMENT ,
    bdate DATE,
    bsession VARCHAR(100),
    tabletype VARCHAR(100),
    count INT(100)
    )"; 

mysqli_query($conn, $query8);

$query10 = "CREATE TABLE IF NOT EXISTS report_user (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    report_id LONGTEXT,
    reportdate DATE,
    book_id VARCHAR(100),
    subjects VARCHAR(100),
    reportdesc LONGTEXT,
    status_rep VARCHAR(100)
    )"; 

mysqli_query($conn, $query10);

$query11 = "CREATE TABLE IF NOT EXISTS report_restaurant (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    report_id LONGTEXT,
    reportdate DATE,
    resspecial_id VARCHAR(100),
    subjects VARCHAR(100),
    reportdesc LONGTEXT,
    status_rep VARCHAR(100)
    )";

?>