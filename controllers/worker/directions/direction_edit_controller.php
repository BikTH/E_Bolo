<?php

if (isset($_REQUEST['direction_id'])) {
    if (isset($_POST['submit_edit_direction'])) {

        $direction = $_REQUEST['direction_id'];

        $error = false;

        foreach (array_values($_POST) as $keys => $values) :
            $data = array_combine(array_keys($_POST), array_values($_POST));
        endforeach;


        if (empty($data['name']) || !is_string($data['name']) || strlen($data['name']) > 254) {
            $error = true;
            $error_content = what_langauge() == 0 ? "Nom incorect ou absent !" : "Incorrect or absent last name !";
        } else {
            $data['name'] = htmlentities(addslashes($data['name']));
        }

        if ($data['director'] == 0) {
            $error = true;
            $error_content = what_langauge() == 0 ? "Veuillez choisir un directeur !" : "Please select a director !";
        } else {
            $data['director'] = htmlentities($data['director']);
        }

        if ($data['access'] == 0) {
            $error = true;
            $error_content = what_langauge() == 0 ? "Veuillez choisir un Modèle de droits d'accès !" : "Please select an access's template !";
        } else {
            $data['access'] = htmlentities($data['access']);
        }

        if ($error == true) {
            require 'views/worker/directions/edit_direction.php';
        } else {
            $error_success = what_langauge() == 0 ? "Direction modifier avec succès !" : "Direction edit with success !";
            // require 'views/worker/directions/add_direction2.php';
            update_directions($direction, $data, $db);
            die('<meta http-equiv="refresh" content="0 ; URL=worker.php?page=views/worker/directions/list_directions&error_success='.$error_success.'">');
        }
    } else {
        $direction_id = $_REQUEST['direction_id'];
        $current_info = currentdirection_info($direction_id, $db);
        require 'views/worker/directions/edit_direction.php';
        //die('<meta http-equiv="refresh" content="0 ; URL=worker.php?page=views/worker/directions/edit_direction">');
    }
}
