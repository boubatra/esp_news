<?php 
    ob_start();
?>
<div class="container">
    <div class="nav">
        <ul>
            <a href="../vue/accueil.php"><li>ACCUEIL</li></a>
            <a href="../vue/sport.php"><li>SPORT</li></a>
            <a href="../vue/sante.php"><li>SANTE</li></a>
            <a href="../vue/education.php"><li>EDUCATION</li></a>
            <a href="../vue/politique.php"><li>POLITIQUE</li></a>
        </ul>
    </div>
    <div class="recherche">
        <form action="../../Controle/verification_recherche.php" method="get">
            <input type="search" name="recherche" placeholder="Recherche">
            <input type="submit" value="Rechercher">
    </div>
</div>
<?php
    $header = ob_get_clean();
    return $header;
?>