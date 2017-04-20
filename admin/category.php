<?php
/*----------------------*/
/*  admin/category.php  */
/*----------------------*/

include ('header.php');

$arrayCat = Category::listCategories();
 echo '<ul>';
foreach($arrayCat as $c) {
	echo '<li><a href="edit_category.php?id='.$c->getId().'">'.$c->getName().'</a></li>';
}
echo '</ul>';
