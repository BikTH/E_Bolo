<?php

if (isset($_GET['add_employee'])) {
    assign_direction_at_user($_GET["employee"], $_GET["direction"], $db);
    $direction_id = $_GET["direction"];
    $error_success = what_langauge() == 0 ? "Utilisateur ajouté à la direction avec succès !" : "User add to this direction with success !";
    $add_employee = 1;
    require 'views/admin3/directions/add_employee_to_direction.php';
}else{
    deassign_direction_at_user($_GET["employee"], $db);
    $direction_id = $_GET["direction"];
    $error_success = what_langauge() == 0 ? "Utilisateur retiré de la direction avec succès !" : "User retrieve to this direction with success !";
    require 'views/admin3/directions/add_employee_to_direction.php';
}
