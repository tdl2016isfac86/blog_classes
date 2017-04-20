<?php
/*-----------*/
/* post.php */
/*-----------*/
include('header.php');

if(isset($_POST['id'])) {
	$comment = new Comment();
    $comment->setPostId($_POST['id']);
    $comment->setCommentor($_POST['commentor']);
    $comment->setContent($_POST['content']);
    $res = $comment->push();
    if($res) {
    	echo 'Votre commentaire a bien été ajouté';
    }
    else {
    	echo 'Erreur, veuillez commentez ultérieurement';
    }
}

if (isset($_REQUEST['id'])) {
    $post = new Post($_REQUEST['id']);
    echo '<h2><a href="post.php?id='.$post->getId().'">'.$post->getTitle().'</a></h2>';
    echo '<p>Publié le '.format_date($post->getPublicationDate()).' par '.$post->getAuthorName();'</p>';
    echo '<p>'.$post->getContent().'</p>';
    echo '<ul>';
    foreach($post->category as $cat) {
    	echo '<li><a href="category.php?id='.$cat->getId().'">'.$cat->getName().'</a></li>';
    }
    echo '</ul>';
    ?>
    <form action="post.php" method="post">
    <input type="text" name="commentor">
    <textarea name="content"></textarea>
    <input type="hidden" name="id" value="<?php echo $post->getId(); ?>">
    <input type="submit" value="Publier">
    </form>
    <?php
	$list = Comment::listComment($post->getId());
    
    echo '<ul>';
    foreach($list as $com) {
        echo '<li>'.$com->getCommentor().'<br/>'.$com->getCommentDate().'<br>'.$com->getContent().'</li>';
    }
    echo '</ul>';
}