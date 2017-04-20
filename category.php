<?php
/*--------------*/
/* category.php */
/*--------------*/

include('header.php');

if (isset($_GET['id'])) {
    $cat = new Category($_GET['id']);
    echo '<h2><a href="category.php?id='.$cat->getId().'">'.$cat->getName().'</a></h2>';
    echo '<p>'.$cat->getDescription().'</p>';
    
    $arrayPost = $cat->listPost();
    echo '<ul>';
    foreach($arrayPost as $p) {
    	echo '<li><a href="post.php?id='.$p->getId().'">'.$p->getTitle().'</a></li>';
    }
    echo '</ul>';
}
else {
	$arrayCat = Category::listCategories();
    echo '<ul>';
    foreach($arrayCat as $c) {
    	echo '<li><a href="category.php?id='.$c->getId().'">'.$c->getName().'</a></li>';
    }
    echo '</ul>';
}