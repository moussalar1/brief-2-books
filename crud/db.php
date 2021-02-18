<?php


$serveur_name ="localhost";
    $db_username ="root";
    $db_password = "";
    $db_name="crud";

    $connect = mysqli_connect($serveur_name,$db_username,$db_password);
    $connect -> set_charset("utf8");
    $dbconfig = mysqli_select_db($connect,$db_name);



  

?>
