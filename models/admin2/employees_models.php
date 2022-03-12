<?php

function list_employee($id_company, $db)
{
    $request = $db->query(" SELECT * FROM users u INNER jOIN companies c ON c.companyId=u.companyId WHERE u.companyId='$id_company' AND userStatus='1' AND userCompanyStatus='1' ") or die(mysqli_error($db));
    return $request;
}

function list_employee_without_admin($id_company, $db)
{
    $request = $db->query(" SELECT * FROM users WHERE CompanyId='$id_company' AND userStatus='1' AND userCompanyStatus='1' AND directionId='0' AND isAdmin='0' AND isAdminSection='0' ") or die(mysqli_error($db));
    return $request;
}

function list_of_direction_employee($id_direction, $id_company, $db)
{
    $request = $db->query(" SELECT * FROM users WHERE CompanyId='$id_company' AND userStatus='1' AND userCompanyStatus='1'AND directionId='$id_direction' AND isAdmin='0' AND isAdminSection='0' ") or die(mysqli_error($db));

    return $request;
}

function employee_role($data, $db)
{
    if ($data["isWorker"] == 1) {
        return language_content("Employé", "Employee");
    }
    if ($data["isAdmin"] == 1) {
        return language_content("Administrateur", "Administrator");
    }
    if ($data["isAdminSection"] == 1) {
        return language_content("directeur", "Director");
    }
}

function employee_is_access($access_id, $db)
{
$request = $db->query("SELECT * FROM `access` WHERE accessId ='{$access_id}'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request);
}

function employee_informations($employee_id, $db)
{
    $request = $db->query(" SELECT * FROM users WHERE userId='$employee_id'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request);
}

function register_new_employee($data, $db)
{
    $password = md5($data['password']);
    $reg = registration_number($data["company"], $db);
    $access_id = $data["access"];

    $db->query("INSERT INTO `users`(`directionId`, `accessId`, `userCompanyStatus`, `userRegistrationNumber`, `companyId`, `userName`, `userPrename`, `userEmail`, `userPassword`, `userBirthday`, `isAdministrator`, `isAdmin`, `isAdminSection`, `isWorker`, `userStatus`, `userGender`, `userPhone`, `userAddedAt`) 
    VALUES ('0','{$access_id}','1','{$reg}','{$data["company"]}','{$data['name']}','{$data['prename']}','{$data['email']}','{$password}','{$data['birthday']}','0','0','0','1','1','{$data['gender']}','{$data['phone']}', now())") or die(mysqli_error($db));
}

function register_new_admin($data, $db)
{
    $password = md5($data['password2']);
    $reg = registration_number($data["company"], $db);
    $access_id = $data["access2"];

    $db->query("INSERT INTO `users`(`directionId`, `accessId`, `userCompanyStatus`, `userRegistrationNumber`, `companyId`, `userName`, `userPrename`, `userEmail`, `userPassword`, `userBirthday`, `isAdministrator`, `isAdmin`, `isAdminSection`, `isWorker`, `userStatus`, `userGender`, `userPhone`, `userAddedAt`) 
    VALUES ('0','{$access_id}','1','{$reg}','{$data["company"]}','{$data['name2']}','{$data['prename2']}','{$data['email2']}','{$password}','{$data['birthday2']}','0','1','0','0','1','{$data['gender2']}','{$data['phone2']}', now())") or die(mysqli_error($db));
}

function user_direction_name($id_direction, $db)
{
    $request = $db->query("SELECT * FROM directions WHERE directionId=$id_direction") or die(mysqli_error($db));
    if (mysqli_num_rows($request) == 0) {
        return "****";
    } else {
        return mysqli_fetch_assoc($request)["directionName"];
    }
}

function user_direction_information($id_direction, $db)
{
    $request = $db->query("SELECT * FROM directions WHERE directionId=$id_direction") or die(mysqli_error($db));

    return mysqli_fetch_assoc($request);
}

function assign_employee_direction($user_id,$direction_id,$db)
{
    $db->query(" UPDATE `users` SET `directionId`='{$direction_id}' WHERE userId='{$user_id}' ") or die(mysqli_error($db));

}

function remove_employee_direction($user_id,$db)
{
    $db->query(" UPDATE `users` SET `directionId`=0 WHERE userId='{$user_id}' ") or die(mysqli_error($db));

}

function assign_employee_access($user_id,$access_id,$db)
{
    $db->query(" UPDATE `users` SET `accessId`='{$access_id}' WHERE userId='{$user_id}' ") or die(mysqli_error($db));

}

function block_employee($user_id,$db)
{
    $db->query(" UPDATE `users` SET `userStatus`=0 WHERE userId='{$user_id}' ") or die(mysqli_error($db));

}
