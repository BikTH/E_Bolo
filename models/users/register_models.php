<?php

function list_companies($db)
{
    $list_companies = $db->query("SELECT * FROM companies") or die(mysqli_error($db));
    return $list_companies;
}

function check_company_by_code($code, $db)
{
    $ifexist = $db->query("SELECT * FROM companies WHERE companyCode='$code'") or die(mysqli_error($db));
    return mysqli_num_rows($ifexist);
}

function check_company_id_by_code($code, $db)
{
    $max = $db->query("SELECT * FROM companies WHERE companyCode='$code'") or die(mysqli_error($db));
    die(print_r(mysqli_fetch_assoc($max)));
    return mysqli_fetch_assoc($max)['companyId'];
}

function register($data, $db)
{
    $password = md5($data['password']);
    $reg = registration_number($data['companylist'], $db);
    $access_id = employee_access($data['companylist'], $db);
    

    $db->query("INSERT INTO `users`(`directionId`, `accessId`, `userCompanyStatus`, `userRegistrationNumber`, `companyId`, `userName`, `userPrename`, `userEmail`, `userPassword`, `userBirthday`, `isAdministrator`, `isAdmin`, `isAdminSection`, `isWorker`, `userStatus`, `userGender`, `userPhone`, `userAddedAt`) 
    VALUES ('0','{$access_id}','1','{$reg}','{$data['companylist']}','{$data['name']}','{$data['prename']}','{$data['email']}','{$password}','{$data['birthday']}','0','0','0','1','0','{$data['gender']}','{$data['phone']}', now())") or die(mysqli_error($db));
    
    unset($_POST);

    login_register($data, $db);
}
