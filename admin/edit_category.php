<?php
/*---------------------------*/
/*  admin/edit_category.php  */
/*---------------------------*/

include('header.php');

if(isset($_POST['name'])) {
    if(empty($_POST['id'])) {
        $category = new Category();
    }
    else {
    	$category = new Category($_POST['id']);
    }
    $category->setName($_POST['name']);
    $category->setDescription($_POST['description']);
    
    $category->push();

    $nouvelId = $category->getId();
}

if(isset($_GET['id'])) {
	$category = new Category($_GET['id']);
    $category->form('edit_category.php');
}
elseif(isset($nouvelId)) {
    $category = new Category($nouvelId);
    $category->form('edit_category.php');
}
else {
    $category = new Category();
    $category->form('edit_category.php');
}