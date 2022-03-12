<?php

if (isset($_REQUEST['access_id'])) {
    $access_id = $_REQUEST['access_id'];
    delete_access($access_id,$db);
    die('<meta http-equiv="refresh" content="0 ; URL=admin2.php?page=views/admin2/right_of_access/list_of_access&error_content=Modèle Supprimé avec succès !">');
}