<?php

define('sql_server', 'localhost');
define('sql_user', 'root');
define('sql_pass', '');
define('sql_database', 'dwblog');

function requete_sql($requete) {
	if(preg_match("/CREATE/",$requete)
		 || preg_match("/DROP/",$requete)
		 || preg_match("/SHOW/",$requete)
		 || preg_match("/DESCRIBE/",$requete)) {
		return FALSE;
	}

	$sql = new PDO('mysql:dbname='.sql_database.';host='.sql_server,sql_user,sql_pass);
	$resultat = $sql->query($requete);
	
	if(preg_match("/INSERT/",$requete)) {
		if ($sql->errorCode() == '00000') {
	        return $sql->lastInsertId();
    	}
    	else {
    		return FALSE;
    	}
	}
	elseif(preg_match("/UPDATE/",$requete)
		 || preg_match("/DELETE/",$requete)) {
		if ($sql->errorCode() == '00000') {
	        return TRUE;
    	}
    	else {
    		return FALSE;
    	}
	}
	elseif(preg_match("/SELECT/",$requete)) {
		if ($sql->errorCode() == '00000') {
	        return $resultat->fetch();
    	}
    	else {
    		return FALSE;
    	}
		
	}
}

/*/ Afficher les titres de tous les articles

$res = requete_sql('SELECT * FROM post');

foreach($res as $post) {
	echo $post->title.'<br>';
}


// Afficher le titre de l'article le plus ancien

$res = requete_sql('SELECT title FROM post ORDER BY publication_date LIMIT 1');

// Pourquoi utiliser un foreach quand on n'a qu'un seul résultat ?
$post = $res[0];
echo $post['title'].'<br>';	


// Insérer un article

$res = requete_sql("INSERT INTO post VALUES(NULL, 'titre', now(), 'content', 5)");

var_dump($res);

*/

$sql = new PDO('mysql:dbname='.sql_database.';host='.sql_server,sql_user,sql_pass);
//$resultat = $sql->query("SELECT * FROM post");

// while($i = $resultat->fetch(PDO::FETCH_ASSOC)) {
// 	echo '<h2>'.$i['title'].'</h2>';
// 	echo '<p>'.$i['content'].'</p>';
// 	echo '<h4>'.$i['publication_date'].'</h4><br><br>';
// }

//var_dump($resultat->fetchAll(PDO::FETCH_ASSOC));
//$ensemble = array();

//while ($i = $resultat->fetch(PDO::FETCH_ASSOC)) {
//	array_push($ensemble, $i);
	
//}

$pdoStatement = $sql->prepare("
	SELECT *
	FROM post
	LEFT JOIN post_category
	ON post.id=post_category.post_id
	WHERE post_category.category_id= :category");

$pdoStatement->execute(array(':category'=>4));
//var_dump($pdoStatement->fetchAll(PDO::FETCH_ASSOC));
$pdoStatement->execute(array(':category'=>6));
//var_dump($pdoStatement->fetchAll(PDO::FETCH_ASSOC));
$pdoStatement->execute(array(':category'=>9));
//var_dump($pdoStatement->fetchAll(PDO::FETCH_ASSOC));

$pdoStatement2 = $sql->prepare("
	SELECT * FROM category WHERE id= :id
	");
$pdoStatement2->execute(array(':id'=>2));
//var_dump($pdoStatement2->fetchAll(PDO::FETCH_ASSOC));

$pdoStatement3 = $sql->prepare("
	SELECT * FROM post WHERE publication_date > now() - INTERVAL 1 DAY
");
$pdoStatement3->execute();
var_dump($pdoStatement3->fetchAll(PDO::FETCH_ASSOC));









