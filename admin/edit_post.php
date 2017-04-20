<?php
/*-----------------------*/
/*  admin/edit_post.php  */
/*-----------------------*/

include('header.php');
if(isset($_POST['title'])) {
    if(empty($_POST['id'])) {
        $article = new Post();
    }
    else {
    	$article = new Post($_POST['id']);
    }
    $article->setTitle($_POST['title']);
    $article->setContent($_POST['content']);
    $article->setAuthorId($_SESSION['id']);
    
    $article->category = array();
    foreach($_POST['category'] as $c) {
    	array_push($article->category, new Category($c));
    }
    $article->push();

    $nouvelId = $article->getId();
}
if(isset($_GET['id'])) {
	$article = new Post($_GET['id']);
    $article->form('edit_post.php');
}
elseif(isset($nouvelId)) {
    $article = new Post($nouvelId);
    $article->form('edit_post.php');
}
else {
    $article = new Post();
    $article->form('edit_post.php');
}
