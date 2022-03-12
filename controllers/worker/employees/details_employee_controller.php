<?php 
if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] > 0) {
    $user_id = (int) htmlentities($_REQUEST['user_id']);
    employee_informations($user_id,$db);
    require 'views/worker/employees/details_employee.php';
    
}

