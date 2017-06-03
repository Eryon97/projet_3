<?php

$bdd = 'mysql:dbname=microcms;host=127.0.0.1';
$user = 'root';
$password = '';

try {
  $donnees = new PDO($bdd, $user, $password);
} catch (PDOException $e) {
  echo "Connexion échouée : " . $e->getMessage();
}

if (isset ($_POST['billet'])) {
  $titre=$_POST["titre"];
  $content=$_POST["content"];
  $donnees->exec("INSERT INTO t_article(`art_id`, `art_title`, `art_content`, `art_author`) VALUES (NULL, $titre, $contenu, '')");
}

?>

<h2> FICHIER AJOUTÉ </h2>