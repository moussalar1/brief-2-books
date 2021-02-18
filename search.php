<?php 
    include "header.php";
    ?>
        <?php  include('crud/from.php') ; ?>
    <?php include ('crud/db.php') ; ?>
<?php
//Requête SQL pour accéder à la table "bien" où se trouvent les informations sur les appartements et immeubles
$sql = "SELECT * FROM data";
$sth = $connect->query($sql);
 
if ($sth === FALSE) {
    echo("Erreur : la requete SQL est incorrecte. <br/>");
} else {
    // $les_books = $sth->fetchAll(PDO::FETCH_ASSOC);
   $les_books = mysqli_fetch_all($sth, MYSQLI_ASSOC);
 
    //var_dump($les_immeubles);
    //Boucle "foreach" pour aller chercher les informations dans la db   
    foreach ($les_books as $un_book) {
 
        //Structure "if" pour adapter le heading de chaque bien en fonction de son type
        //Maison
        if ($un_book['title'] === 'maison') {
            echo ("<div class='panel panel-primary'><div class='panel-heading'>Maison</div>");
 
            if (utilisateur_est_authentifie()) {
                $id = $un_book['id'];
                echo("<a href='index.php?choix=suppression_immeuble&id=$id'>Supprimer le bien</a> \r\n");
            }
        }
 
        //Appartemment
        else if ($un_book['title'] === 'appartement') {
            echo ("<div class='panel panel-primary'><div class='panel-heading'>Appartemment</div>");
 
            if (utilisateur_est_authentifie()) {
                $id = $un_book['id'];
                echo("<a href='index.php?choix=suppression_immeuble&id=$id'>Supprimer le bien</a> \r\n");
            }
        }
 
        //Dans le cas où lors de la création d'un nouveau bien, si le type ne correspond à aucun des deux ci-dessus
        //ou qu'il y ait une faute d'orthographe, on ait "Autre" qui apparaisse
        else {
            echo ("<div class='panel panel-primary'><div class='panel-heading'>Autre</div>");
            $id = $un_book['id'];
            echo("<a href='index.php?choix=suppression_immeuble&id=$id'>Supprimer le bien</a>\r\n");
        }
 
 
        echo("<div class='panel-body'><p> <b>Name : </b> : " . $un_book['title'] . "</p> \r\n");
        echo("<p> <b>Author : </b> : " . $un_book['author'] . "</p> \r\n ");
        echo("<p> <b>Date de Publication</b> : " . $un_book['pub'] . "</p> \r\n ");
        echo("<p> <b>Quantité au stock :</b> : " . $un_book['quantité'] . "</p> \r\n ");
        echo("<p> <b>Prix :</b> : " . $un_book['prix'] . "</p> \r\n ");
      
 
        echo("<p> <b>Image</b> : " . $un_book['image'] . "</p></div> \r\n ");
         
        if(isset($_SESSION['image'])){
            if ($_SESSION['image'] === $un_book['image']){
                echo ('<img src="crud/images/'.$un_book['image'].'"/>');
            }
            else {
                echo ("Image not found");
            }
        }
         
        echo ("</div>");
    }
}
?> <br><br>