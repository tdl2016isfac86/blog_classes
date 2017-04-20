<?php
/* --------------- */
/* admin/login.php */
/* --------------- */
require_once('../classes/author.php');
require_once('../functions.php');
require_once('../config.php');

if(isset($_POST['username'])) {
	session_start();
	$login = author::authorConnect($_POST['username'],$_POST['password']);
}
if(isset($_SESSION['id'])) {
	header('Location:index.php');
}
?>

<form method="post" action="login.php">
	<input type="text" name="username" placeholder="Username">
	<input type="password" name="password">
	<input type="submit" value="Valider">
</form>