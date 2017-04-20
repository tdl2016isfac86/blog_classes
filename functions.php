<?php

function requete_sql($requete) {
//	$sql = new PDO('mysql:dbname=dwblog;host=localhost;$user=root;$pass=');
	$sql = new PDO(
'mysql:dbname='.sql_database.'host='.sql_server.';user='.sql_user.';pass='.sql_pass);
	$resultat = $sql->query($requete);
	// $resultat fournit la valeur de retour par défaut de mysql_query

	if(preg_match("/INSERT/", $requete) && $resultat) {
		$resultat = $sql->insert_id;
	}

	$sql->close();

	return $resultat;
}


function requete_sql($requete) {
	$sql = new mysqli(sql_server, sql_user,sql_pass, sql_database);
	$resultat = $sql->query($requete);
	// $resultat fournit la valeur de retour par défaut de mysql_query

	if(preg_match("/INSERT/", $requete) && $resultat) {
		$resultat = $sql->insert_id;
	}

	$sql->close();

	return $resultat;
}



function format_date($str) {
	$mois = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');

	$tableau = explode(' ', $str);
	$date = explode('-', $tableau[0]);
	$heure = explode(':', $tableau[1]);

	return $date[2].' '.$mois[$date[1]-1].' '.$date[0].
	' à '.$heure[0].'h'.$heure[1];
}