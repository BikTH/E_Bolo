<?php

if (isset($_GET["file_id"])) {

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;
    $id_file=$_GET["file_id"];
    $data = get_file_info($_GET["file_id"], $db);
    require 'views\admin2\company_files\edit_files.php';
}

if (isset($_POST["submit_edit_file"])) {
    $error = false;

    // var_dump($_FILES['files']['name']);
    // die();

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (isset($_FILES["files"]) && file_error("files") === false) {
        if (isset($_FILES["files"]) && file_size("files") === false) {
            if (isset($_FILES["files"]) && file_extension("files") === false) {
            } else {
                $error_content = what_langauge() == 0 ? "Extension de fichier non pris en charge!" : " File's extension is wrong ! ";
                require 'views/admin2/company_files/edit_files.php';
            }
        } else {
            $error_content = what_langauge() == 0 ? "Fichier trop grande !" : " File is too big ";
            require 'views/admin2/company_files/edit_files.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Fichier érroné !" : " File's endommaged ";
        require 'views/admin2/company_files/edit_files.php';
    }

    if ($error == true) {
    } else {
        edit_file($data["id"], $db);
        $error_success = what_langauge() == 0 ? "Fichier Modifié avec succès!" : "File edit with success !";
        die('<meta http-equiv="refresh" content="0 ; URL=admin2.php?page=views/admin2/company_files/list_files&error_success=' . $error_success . '">');
    }
}
