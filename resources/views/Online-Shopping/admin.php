<?php

require_once 'Includes/connection.php';
include 'header.php';



// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username']) ){

  header("location: login.php?msg=please login!");
  exit;
}

if($_SESSION['role'] != 'Admin') {
  $msg = "You are not authorized to view admin page! \n";
  header("location: profile.php?msg=$msg");
  exit;
}

?>

<h1> Admin Dashboard</h1>
 <a href="<?php echo $site_root;?>/add_product.php">Add a Product</a>
 <a href="<?php echo $site_root;?>/index.php">Manage Products</a>
 <a href="<?php echo $site_root;?>/manage_orders.php">Manage Orders</a>
