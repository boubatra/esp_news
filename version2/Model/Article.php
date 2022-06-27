<?php
function dbConnect()
{
	try {
		$database = new PDO('mysql:host=localhost;dbname=mglsi_news;charset=utf8', 'root', '');
		// $database = new PDO('mysql:host=192.168.43.81;port=8889;dbname=mglsi_news;charset=utf8', 'mglsi_user', 'passer');

		return $database;
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
}

function getArticles($cat = "")
{
	// connexion à la base de données
	$database = dbConnect();
	if (strlen($cat) > 0) {

		$statement = $database->query(
			"SELECT * FROM article where categorie=$cat  ORDER BY dateModification DESC"
		);
	} else {
		$statement = $database->query(
			"SELECT * FROM article  ORDER BY dateModification DESC"
		);
	}
	// Recuperer les articles
	$articles = [];
	while (($row = $statement->fetch())) {
		$article = [
			'id' => $row['id'],
			'titre' => $row['titre'],
			'dateCreation' => $row['dateCreation'],
			'dateModification' => $row['dateModification'],
			'contenu' => $row['contenu'],
			'categorie' => $row['categorie'],
		];

		$articles[] = $article;
	}

	return $articles;
}
function getArticle($id)
{
	$database = dbConnect();

	$statement = $database->prepare(
		"SELECT id, titre, contenu, DATE_FORMAT(dateCreation, '%d/%m/%Y à %Hh%imin%ss') AS dateCreation FROM article WHERE id = ?"
	);
	$statement->execute([$id]);

	$row = $statement->fetch();
	$article = [
		'id' => $row['id'],
		'titre' => $row['titre'],
		'dateCreation' => $row['dateCreation'],
		'contenu' => $row['contenu'],
	];

	// print '<pre>';
	// var_dump($article);
	// print '</pre>';

	return $article;
}

function getCategories()
{
	$database = dbConnect();

	$statement = $database->query(
		"SELECT * FROM categorie"
	);
	$categories = [];
	while (($row = $statement->fetch())) {
		$categorie = [
			'id' => $row['id'],
			'libelle' => $row['libelle'],
		];

		$categories[] = $categorie;
	}

	return $categories;
}

function getCategorie($id)
{
	$database = dbConnect();

	$statement = $database->query(
		"SELECT * FROM article where categorie= $id ORDER BY dateModification DESC"
	);
	while (($row = $statement->fetch())) {
		$article = [
			'id' => $row['id'],
			'titre' => $row['titre'],
			'dateCreation' => $row['dateCreation'],
			'dateModification' => $row['dateModification'],
			'contenu' => $row['contenu'],
			'categorie' => $row['categorie'],
		];

		$articles[] = $article;
	}
}
