<?php

if(isset($_GET["file_id"])){
    delete_file($_GET["file_id"],$db);
    $error_success = what_langauge() == 0 ? "Fichier supprimé avec succès!" : "File delete with success !";
    die('<meta http-equiv="refresh" content="0 ; URL=worker.php?page=views/worker/company_files/list_files&error_success=' . $error_success . '">');
}