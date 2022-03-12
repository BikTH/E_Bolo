<?php
//die(print("bonjourrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr"));
if (isset($_POST["submit_upload_file"])) {

    $error = false;

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (!empty($data["name"]) && check_file_name($data["name"], $db) === 0) {
        $name = $data["name"];
    } else {
        $name = new SplFileInfo($_FILES['files']['name']);
        $name->getFilename();
        if (check_file_name($name, $db) !== 0) {
            $error_content = what_langauge() == 0 ? "Un fichier porte deja le nom du fichier uploadé, veuillez entrez un nom pour ce fichier !" : "Already used file name, Write a name for this file !";
            require 'views/worker/company_files/upload_files.php';
        }
    }

    if (!empty($data["name"]) && check_file_name($data["name"], $db) !== 0) {
        $error_content = what_langauge() == 0 ? "Nom de fichier dejà utilisé, choisissez en un autre!" : " incorrect or already used file name, choose another one!";
        require 'views/worker/company_files/upload_files.php';
    }

    if (isset($_FILES["files"]) && file_error("files") === false) {
        if (isset($_FILES["files"]) && file_size("files") === false) {
            if (isset($_FILES["files"]) && file_extension("files") === false) {
                if ($error == true) {
                } else {
                    save_file($name, $db);
                    $error_success = what_langauge() == 0 ? "Fichier importé avec succès!" : "File upload with success !";
                    die('<meta http-equiv="refresh" content="0 ; URL=worker.php?page=views/worker/company_files/list_files&error_success=' . $error_success . '">');
                }
            } else {
                $error_content = what_langauge() == 0 ? "Extension de fichier non pris en charge!" : " File's extension is wrong ! ";
                require 'views/worker/company_files/upload_files.php';
            }
        } else {
            $error_content = what_langauge() == 0 ? "Fichier trop grand !" : " File is too big ";
            require 'views/worker/company_files/upload_files.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Fichier érroné !" : " File's endommaged ";
        require 'views/worker/company_files/upload_files.php';
    }
}
