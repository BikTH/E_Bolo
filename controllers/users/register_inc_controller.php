<?php

$error = false;

if (isset($_POST['submit_register_inc'])) {

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (check_user_email($data['email'], $db) === 0) {
        if (check_user_contact($data['phone'], $db) === 0) {

            $data['phone'] = htmlentities(addslashes($data['phone']));

            if (empty($data['name']) || !is_string($data['name']) || strlen($data['name']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Nom incorect ou absent !" : "Incorrect or absent last name !";
                require 'views/users/register_inc.php';
            } else {
                $data['name'] = htmlentities(addslashes($data['name']));
            }

            if (empty($data['prename']) || !is_string($data['prename']) || strlen($data['prename']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Prénom incorect ou absent !" : " Incorrect or absent first name !";
                require 'views/users/register_inc.php';
            } else {
                $data['prename'] = htmlentities(addslashes($data['prename']));
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Adresse email incorrecte choisissez en une autre!" : " Incorrect email address choose another one !";
                require 'views/users/register_inc.php';
            } else {
                $data['email'] = htmlentities(addslashes($data['email']));
            }

            if (strlen($data['password']) < 5 || empty($data['password']) || !is_string($data['password']) || empty($data['confirm_password']) || !is_string($data['confirm_password']) || $data['password'] !== $data['confirm_password'] || strlen($data['password']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Mot de passe incorrect ou pas assez sécurisé, choisissez en un autre!" : " Incorrect password or not secure enough, choose a different one !";
                require 'views/users/register_inc.php';
            } else {
                $data['password'] = htmlentities(addslashes($data['password']));
            }

            if (strlen($data['description']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Description trop longue!" : " Description too long";
                require 'views/users/register_inc.php';
            } else {
                $data['description'] = htmlentities(addslashes($data['description']));
                $date['gender'] = htmlentities(addslashes($data['gender']));
            }

            if (strlen($data['slogan']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Slogan trop longue!" : " Slogan too long";
                require 'views/users/register_inc.php';
            } else {
                $data['slogan'] = htmlentities(addslashes($data['slogan']));
            }

            if (strlen($data['name_inc']) > 254 || check_company_name($data['name_inc'], $db) != 0) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Nom d'entreprise incorrect ou deja pris, choisissez en un autre!" : " incorrect or already taken company name,choose another one!";
                require 'views/users/register_inc.php';
            } else {
                $data['name_inc'] = htmlentities(addslashes($data['name_inc']));
            }

            if ($error === true) {
            } else {
                if (isset($_FILES["image"]) && image_error("image") === false) {
                    if (isset($_FILES["image"]) && image_size("image") === false) {
                        if (isset($_FILES["image"]) && image_extension("image") === false) {

                            register_inc($data, $db);
                            $error_success = what_langauge() == 0 ? "Compte créer avec succès ! " : " Account create with success ! ";
                            require 'views/index/home_index.php';


                        } else {
                            $error_content = what_langauge() == 0 ? "Extension de l'image non pris en charge!" : " Image extension is wrong ! ";
                            require 'views/users/register_inc.php';
                        }
                    } else {
                        $error_content = what_langauge() == 0 ? "Image trop grande !" : " Image is too big ";
                        require 'views/users/register_inc.php';
                    }
                } else {
                    $error_content = what_langauge() == 0 ? "Image érroné !" : " Image érroné ";
                    require 'views/users/register_inc.php';
                }
            }
        } else {
            $error_content = what_langauge() == 0 ? "Numéros de téléphone incorect ou deja utilisé, choisissez en un autre!" : " incorrect or already used phone number, choose another one!";
            require 'views/users/register_inc.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Adresse email deja prise, choisissez en une autre!" : " Email address already taken, choose another one !";
        require 'views/users/register_inc.php';
    }
}
