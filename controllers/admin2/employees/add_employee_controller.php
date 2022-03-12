<?php

if (isset($_POST["submit_add_employee"])) {
    $error = false;
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (check_user_email($data['email'], $db) === 0) {
        if (check_user_contact($data['phone'], $db) === 0) {

            $data['phone'] = htmlentities(addslashes($data['phone']));

            if (empty($data['name']) || !is_string($data['name']) || strlen($data['name']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Nom incorect ou absent !" : "Incorrect or absent last name !";
                require 'views/admin2/employees/add_employee.php';
            } else {
                $data['name'] = htmlentities(addslashes($data['name']));
            }

            if (empty($data['prename']) || !is_string($data['prename']) || strlen($data['prename']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Prénom incorect ou absent !" : " Incorrect or absent first name !";
                require 'views/admin2/employees/add_employee.php';
            } else {
                $data['prename'] = htmlentities(addslashes($data['prename']));
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Adresse email incorrecte choisissez en une autre!" : " Incorrect email address choose another one !";
                require 'views/admin2/employees/add_employee.php';
            } else {
                $data['email'] = htmlentities(addslashes($data['email']));
            }

            if (($data["gender"] == "Masculin" && $data["gender"] != "Feminin") || ($data["gender"] != "Masculin" && $data["gender"] == "Feminin")) {
                $data['gender'] = htmlentities(addslashes($data['gender']));
            } else {
                $error = true;
                $error_content = what_langauge() == 0 ? "Veuillez choisir un genre !" : " Please choose a gender for this user !";
                require 'views/admin2/employees/add_employee.php';
            }

            if (strlen($data['password']) < 5 || empty($data['password']) || !is_string($data['password']) || empty($data['confirm_password']) || !is_string($data['confirm_password']) || $data['password'] !== $data['confirm_password'] || strlen($data['password']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Mot de passe incorrect ou pas assez sécurisé, choisissez en un autre!" : " Incorrect password or not secure enough, choose a different one !";
                require 'views/admin2/employees/add_employee.php';
            } else {
                $data['password'] = htmlentities(addslashes($data['password']));
            }

            if ($data['access'] != 0) {
                $data['access'] = htmlentities($data['access']);
            }

            if ($error === true) {
            } else {
                register_new_employee($data, $db);
                $error_success = what_langauge() == 0 ? "Employé ajouté avec succès !" : "Employee add with success !";
                die('<meta http-equiv="refresh" content="0 ; URL=admin2.php?page=views/admin2/employees/list_employee&error_success=' . $error_success . '">');
            }
        } else {
            $error_content = what_langauge() == 0 ? "Numéros de téléphone incorect ou deja utilisé, choisissez en un autre!" : " incorrect or already used phone number, choose another one!";
            require 'views/admin2/employees/add_employee.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Adresse email deja prise, choisissez en une autre!" : " Email address already taken, choose another one !";
        require 'views/admin2/employees/add_employee.php';
    }
}

if (isset($_POST["submit_add_admin"])) {
    $error = false;
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (check_user_email($data['email2'], $db) === 0) {
        if (check_user_contact($data['phone2'], $db) === 0) {

            $data['phone2'] = htmlentities(addslashes($data['phone2']));

            if (empty($data['name2']) || !is_string($data['name2']) || strlen($data['name2']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Nom incorect ou absent !" : "Incorrect or absent last name !";
                require 'views/admin2/employees/add_employee.php';
            } else {
                $data['name2'] = htmlentities(addslashes($data['name2']));
            }

            if (empty($data['prename2']) || !is_string($data['prename2']) || strlen($data['prename2']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Prénom incorect ou absent !" : " Incorrect or absent first name !";
                require 'views/admin2/employees/add_employee.php';
            } else {
                $data['prename2'] = htmlentities(addslashes($data['prename2']));
            }

            if (empty($data['email2']) || !filter_var($data['email2'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Adresse email incorrecte choisissez en une autre!" : " Incorrect email address choose another one !";
                require 'views/admin2/employees/add_employee.php';
            } else {
                $data['email2'] = htmlentities(addslashes($data['email2']));
            }

            if (($data["gender2"] == "Masculin" && $data["gender2"] != "Feminin") || ($data["gender2"] != "Masculin" && $data["gender2"] == "Feminin")) {
                $data['gender2'] = htmlentities(addslashes($data['gender2']));
            } else {
                $error = true;
                $error_content = what_langauge() == 0 ? "Veuillez choisir un genre !" : " Please choose a gender for this user !";
                require 'views/admin2/employees/add_employee.php';
            }

            if (strlen($data['password2']) < 5 || empty($data['password2']) || !is_string($data['password2']) || empty($data['confirm_password2']) || !is_string($data['confirm_password2']) || $data['password2'] !== $data['confirm_password2'] || strlen($data['password2']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Mot de passe incorrect ou pas assez sécurisé, choisissez en un autre!" : " Incorrect password or not secure enough, choose a different one !";
                require 'views/admin2/employees/add_employee.php';
            } else {
                $data['password2'] = htmlentities(addslashes($data['password2']));
            }

            if ($data['access2'] != 0) {
                $data['access2'] = htmlentities($data['access2']);
            }

            if ($error === true) {
            } else {
                register_new_admin($data, $db);
                $error_success = what_langauge() == 0 ? "Administrateur ajouté avec succès !" : "Administrator add with success !";
                die('<meta http-equiv="refresh" content="0 ; URL=admin2.php?page=views/admin2/employees/list_employee&error_success=' . $error_success . '">');
            }
        } else {
            $error_content = what_langauge() == 0 ? "Numéros de téléphone incorect ou deja utilisé, choisissez en un autre!" : " incorrect or already used phone number, choose another one!";
            require 'views/admin2/employees/add_employee.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Adresse email deja prise, choisissez en une autre!" : " Email address already taken, choose another one !";
        require 'views/admin2/employees/add_employee.php';
    }
}
