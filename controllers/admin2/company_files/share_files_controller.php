<?php 

if(isset($_GET["file_id"])){
    $file_id =(int) htmlentities($_GET["file_id"]) ;
    require 'views/admin2/company_files/share_file_to.php';
}

if(isset($_GET["share_file"])){
    $file_id =(int) htmlentities($_GET["file_id2"]) ;
    $receiver =(int) htmlentities($_GET["receiver"]) ;

    add_file_message($file_id,$receiver,$db);

    $error_success = what_langauge() == 0 ? "Fichier Partagé avec succès!" : "File share with success !";
    die('<meta http-equiv="refresh" content="0 ; URL=admin2.php?page=views/admin2/company_files/list_files&error_success=' . $error_success . '">');

}