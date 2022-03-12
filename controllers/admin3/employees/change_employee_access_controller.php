<?php 

if (isset($_POST["submit_access"])) {
    $error = false;
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if ($data["access"] == 0) {
        $error = true;
        $error_content = what_langauge() == 0 ? "Choisisez un modèle de droit d'accès pour poursuivre !" : " Choose right of access's template if you want to continue !";
        require 'views\admin3\employees\list_employee.php';
    } else {
        $data['access'] = htmlentities(addslashes($data['access']));
        $data['user2'] = htmlentities(addslashes($data['user2']));
        assign_employee_access($data["user2"], $data["access"], $db);
        $error_content = what_langauge() == 0 ? "Droit d'accès changé succès !" : "Right of access change with success!";
        die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/employees/list_employee&error_success=' . $error_content . '">');
    }
}
