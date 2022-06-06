<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/archi/actu/Persistance/connexion.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/archi/actu/Presentation/layout/header.php";

    
    if (isset($_REQUEST['Rechercher'])){
        $_REQUEST['recherche'] = htmlspecialchars($_REQUEST['recherche']);
        $recherche = $_REQUEST['recherche'];
        $requete = $db->prepare("SELECT * FROM articles WHERE titre LIKE '%$recherche%' OR contenu LIKE '%$recherche%'");
        $requete->execute();
        $resultat_recherche = $requete->fetchAll();

        header("Location: http://".$_SERVER['HTTP_HOST']."/archi/actu/Presentation/vue/recherche.php");
    }
?>