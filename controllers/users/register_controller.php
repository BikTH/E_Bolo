<?php

$error = false;

if (isset($_POST['submit_register'])) {

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (check_user_email($data['email'], $db) === 0) {
        if (check_user_contact($data['phone'], $db) === 0) {

            $data['phone'] = htmlentities(addslashes($data['phone']));

            if (empty($data['name']) || !is_string($data['name']) || strlen($data['name']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Nom incorect ou absent !" : "Incorrect or absent last name !";
                require 'views/users/register.php';
            } else {
                $data['name'] = htmlentities(addslashes($data['name']));
            }

            if (empty($data['prename']) || !is_string($data['prename']) || strlen($data['prename']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Prénom incorect ou absent !" : " Incorrect or absent first name !";
                require 'views/users/register.php';
            } else {
                $data['prename'] = htmlentities(addslashes($data['prename']));
            }

            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Adresse email incorrecte choisissez en une autre!" : " Incorrect email address choose another one !";
                require 'views/users/register.php';
            } else {
                $data['email'] = htmlentities(addslashes($data['email']));
                $data['gender'] = htmlentities(addslashes($data['gender']));
            }

            if (strlen($data['password']) < 5 || empty($data['password']) || !is_string($data['password']) || empty($data['confirm_password']) || !is_string($data['confirm_password']) || $data['password'] !== $data['confirm_password'] || strlen($data['password']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Mot de passe incorrect ou pas assez sécurisé, choisissez en un autre!" : " Incorrect password or not secure enough, choose a different one !";
                require 'views/users/register.php';
            } else {
                $data['password'] = htmlentities(addslashes($data['password']));
            }

            if ($data['companylist'] != 0 && !empty($data['companycode'])) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Veuillez sélectionner votre entreprise  soit dans la liste soit en saisisant son code !" : "Please choose your company from the list or enter its code";
                require 'views/users/register.php';
            }

            if (!empty($data['companycode'])){
                if(check_company_by_code($data['companycode'], $db) === 0){
                    $error = true;
                    $error_content = what_langauge() == 0 ? "Code d'entreprise incorrect, Saisisez en une valide ou trouvez là dans la liste !" : "incorrect company code, enter a valid company code or find it in the list !";
                    require 'views/users/register.php';
                }else{
                    $data['companylist'] = check_company_id_by_code($data['companycode'], $db);
                    $data['companylist'] = htmlentities($data['companylist']);
                }
            }

            if($data['companylist'] != 0){
                $data['companylist'] = htmlentities($data['companylist']);
            }

            if ($error === true) {
            } else {
                register($data, $db);
            }
        } else {
            $error_content = what_langauge() == 0 ? "Numéros de téléphone incorect ou deja utilisé, choisissez en un autre!" : " incorrect or already used phone number, choose another one!";
            require 'views/users/register.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Adresse email deja prise, choisissez en une autre!" : " Email address already taken, choose another one !";
        require 'views/users/register.php';
    }
}
