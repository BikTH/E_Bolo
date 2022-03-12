<?php

if (isset($_POST["submit_direction"])) {
    $error = false;
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if ($data["direction"] == 0) {
        $error = true;
        $error_content = what_langauge() == 0 ? "Choisisez une direction pour poursuivre !" : " Choose a direction if you want to continue !";
        require 'views\admin2\employees\list_employee.php';
    } else {
        $data['direction'] = htmlentities(addslashes($data['direction']));
        $data['user'] = htmlentities(addslashes($data['user']));
        assign_employee_direction($data["user"], $data["direction"], $db);
        $error_content = what_langauge() == 0 ? "Employé ajouté à la direction avec succès !" : "Employee add with success to the direction !";
        die('<meta http-equiv="refresh" content="0 ; URL=admin2.php?page=views/admin2/employees/list_employee&error_success=' . $error_content . '">');
    }
}
