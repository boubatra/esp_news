<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/archi/actu/Presentation/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/archi/actu/Persistance/connexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/archi/actu/Controle/verification_recherche.php";
?>
<!Doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
    <title>POLITIQUE</title>
    <link rel="stylesheet" href="../src/css/style_accueil.css">
    <link rel="stylesheet" href="../src/css/style_header.css">
    <script src="../src/js/script_accueil.js"></script>
</head>
<style>
    body {
        background-color: #9BC1BC;

    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;

    }

    .nav li {
        float: left;
        margin-left: 10px;

    }

    .nav li a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
    }

    .nav li a:hover {
        background-color: #FFA69E;
    }

    .container {
        position: relative;
        text-align: center;
        color: white;
        background-color: #F4F1BB;
        width: 100%;
        height: 100%;
        margin-top: 0;
        margin-left: 0;
        margin-right: 0;
        margin-bottom: 30px;
        padding-top: 20px;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 20px;

    }

    .card {
        width: 100%;
        height: 100%;
        background-color: #f2f2f2;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #000000;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .card-title {
        background-color: #f2f2f2;
        border-radius: 10px 10px 0px 0px;
        height: 50px;
        width: 100%;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        color: #000000;
    }

    .card-content {
        background-color: #f2f2f2;
        border-radius: 0px 0px 10px 10px;
        height: 100%;
        width: 100%;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        color: #000000;
    }
</style>

<body>
    <?php
    echo $header;
    $query = "SELECT * FROM articles inner join categories on articles.categorie = categories.id WHERE categories.libelle = 'Politique' ORDER BY dateModification DESC";
    $result = $db->query($query);
    $result->setFetchMode(PDO::FETCH_OBJ);

    while ($ligne = $result->fetch()) {
    ?>
        <div class="card">
            <div class="card-wrapper">
                <div class="card-title">
                    <h2><a href="lecture.php"><?php echo $ligne->titre; ?></a></h2>
                </div>
                <div class="card-content">
                    <p><?php echo $ligne->contenu; ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>