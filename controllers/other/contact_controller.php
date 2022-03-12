<?php

$error = false;

if (isset($_POST["submit_contact"])) {

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    

    if (empty($data['message']) || strlen($data['message']) > 254 || !is_string($data['message'])) {
        $error = true;
        $error_content=what_langauge() == 0 ? "Votre message est trop long ou absent !" : "Message too long";
    }else{
        $data['name'] = htmlentities(addslashes($data['name']));
        $data['email'] = htmlentities(addslashes($data['email']));
        $data['subject'] = htmlentities(addslashes($data['subject']));
        $data['message'] = htmlentities(addslashes($data['message']));
    }

    if ($error === true) {
        require 'views\others\unactive_user.php';
    } else {
        send_contact($data, $db);
        //$curent_page = $_SERVER['HTTP_REFERER'] ;
        $msg = "message envoyé avec succès";
        //die('<meta http-equiv="refresh" content="0 ; URL=' . $curent_page . '">');
        die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/others/unactive_user&error_success=' . $msg . '">');
    }
}
