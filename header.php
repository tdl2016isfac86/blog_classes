<?php
/*------------*/
/* header.php */
/*------------*/
require_once('config.php');
require_once('functions.php');

$list = scandir('classes/');
foreach($list as $fichier) {
	if($fichier != '.' && $fichier != '..') {
    	require_once('classes/'.$fichier);
    }
}

?><!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Mon blog trop classe</title>
</head>
<body>
<nav>
<ul>
<li><a href="index.php">Accueil</a></li>
<li><a href="category.php">Catégories</a></li>
</ul>
</nav>