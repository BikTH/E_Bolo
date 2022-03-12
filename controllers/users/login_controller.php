<?php

$error = false;

if (isset($_POST['submit_login'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) || empty($data['password'])) {
        $error = true;
    }

    if ($error === true) {
        $error_content = "<strong>Email</strong> ou <strong>Mot de passe</strong> incorrect !.";
        require 'views/users/register.php';
    } else {
        login($data, $db); 
    }
}
