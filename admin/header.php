<?php 
/* ---------------- */
/* admin/header.php */
/* ---------------- */

session_start();

require_once('../config.php');
require_once('../functions.php');

$list = scandir('../classes');
foreach ($list as $fichier) {
  if($fichier != '.' && $fichier != '..') {
      require_once('../classes/'.$fichier);
    }
}

?><!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
      <script src="https://use.fontawesome.com/b9c6bd7ee4.js"></script>
        <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Admin</title>
  </head>
  <body>
<?php
if(isset($_SESSION['id'])) {
?>
<nav>
  <div class="main-nav">
    <ul>
      <li><a href="index.php">Acceuil</a></li>
      <li><a href="index.php">Articles</a></li>
      <li><a href="category.php">Categories</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
<section class="main-content">
<?php
}
else {
  header('Location:login.php');
}