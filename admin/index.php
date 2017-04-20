<?php
/* --------------- */
/* admin/index.php */
/* --------------- */
include("header.php");

$postList = Post::listPosts();

foreach($postList as $p) {
    echo '<h2><a href="edit_post.php?id='.$p->getId().'">'.$p->getTitle().'</a></h2>';
    echo 'Publié le '.format_date($p->getPublicationDate()).' par '.$p->getAuthorName().'<br>';
    echo substr($p->getContent(),0,100);
}