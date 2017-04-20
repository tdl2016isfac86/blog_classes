<?php
/*-----------*/
/* index.php */
/*-----------*/

include('header.php');

/*$articles = requete_sql("SELECT id FROM post ORDER BY publication_date DESC LIMIT 0,5");

while($i = $articles->fetch_assoc()) {
	$post = new Post($i['id']);
    echo '<h2><a href="post.php?id='.$post->getId().'">'.$post->gettitle().'</a></h2>';
    echo 'Publié le '.format_date($post->getPublicationDate()).' par '.$post->getAuthorName().'<br>';
    echo substr($post->getcontent(), 0, 100).'...';
}*/

$nbTotalPosts = Post::nbTotalPosts();

if (isset($_GET['page'])) {
	$page =$_GET['page']-1;
}
else {
	$page = 0;
}


$list = Post::listPosts(($page*5),5);
foreach($list as $post){
    echo '<h2><a href="post.php?id='.$post->getId().'">'.$post->gettitle().'</a></h2>';
    echo 'Publié le '.format_date($post->getPublicationDate()).' par '.$post->getAuthorName().'<br>';
    echo substr($post->getcontent(), 0, 100).'...';
}
echo '<br>';
$nbPages = ceil($nbTotalPosts/5);

	if ($page != 0) {
		echo '<span class="page">
				<a href="index.php?page='.$page.'"> < </a>
			</span>';
	}

	for ($i=1; $i <= $nbPages ; $i++) { 
		if ($i-1 == $page) {
			echo '<span class="present">'.$i.'</span>';
		}
		else {
			echo '<span class="page">
					<a href="index.php?page='.$i.'">'.$i.'</a>
				</span> ';
		}
		if ($i != $nbPages) {
			echo '  ';
		}
	}

	if ($page != $nbPages-1) {
		echo '<span class="page">
				<a href="index.php?page='.($page+2).'"> > </a>
			</span>';
	}