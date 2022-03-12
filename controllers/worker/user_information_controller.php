<?php

$error = false;

if (isset($_POST['submit_update_informations_user'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (check_user_email($data['email'], $db) === 0) {
        if (check_user_contact($data['phone'], $db) === 0  || filter_var($data['phone'], FILTER_VALIDATE_INT) || !empty($data['phone']) || is_string($data['phone'])) {
            $data['phone'] = htmlentities(addslashes($data['phone']));

            if (empty($data['name']) || !is_string($data['name']) || strlen($data['name']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Nom incorect ou absent !" : "Incorrect or absent last name !";
                require 'views/users/user_information.php';
            } else {
                $data['name'] = htmlentities(addslashes($data['name']));
            }

            if (empty($data['prename']) || !is_string($data['prename']) || strlen($data['prename']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Prénom incorect ou absent !" : " Incorrect or absent first name !";
                require 'views/users/user_information.php';
            } else {
                $data['prename'] = htmlentities(addslashes($data['prename']));
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Adresse email incorrecte choisissez en une autre!" : " Incorrect email address choose another one !";
                require 'views/users/user_information.php';
            } else {
                $data['email'] = htmlentities(addslashes($data['email']));
                $data['gender'] = htmlentities(addslashes($data['gender']));
            }
        } else {
            $error_content = what_langauge() == 0 ? "Numéros de téléphone incorect ou deja utilisé, choisissez en un autre!" : " incorrect or already used phone number, choose another one!";
            require 'views/users/user_information.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Adresse email deja prise, choisissez en une autre!" : " Email address already taken, choose another one !";
        require 'views/users/user_information.php';
    }

    if ($error == false) {
        update_user_informations($data, $db);
    }
}

if (isset($_POST['submit_update_pw'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;
}

if (isset($_POST['submit_update_avatar'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (isset($_FILES["image"]) && file_error("image") === false) {
        if (isset($_FILES["image"]) && file_size("image") === false) {
            if (isset($_FILES["image"]) && file_extension("image") === false) {

                update_avatar($data, $db);
                $msg = what_langauge() ? "AVATAR CHANGE AVEC SUCCCES" : "AVATAR CHANGE WITH SUCCESS" ;
                die('<meta http-equiv="refresh" content="1 ; URL=worker.php?page=views/users/user_information&error_success=' . $msg . '">');
                //header("location:worker.php?page=views/worker/user_information");

            } else {
                $error_content = what_langauge() == 0 ? "Extension de fichier non pris en charge!" : " File's extension is wrong ! ";
                require 'views/worker/files_worker/upload_files.php';
            }
        } else {
            $error_content = what_langauge() == 0 ? "Fichier trop grand !" : " File is too big ";
            require 'views/worker/files_worker/upload_files.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Fichier érroné !" : " File's endommaged ";
        require 'views/worker/files_worker/upload_files.php';
    }
}
