<?php

function list_directions($company_id, $db)
{
    $request = $db->query(" SELECT * FROM users u INNER JOIN directions d ON u.userId = d.directionAdmin WHERE u.companyId='$company_id' ") or die(mysqli_error($db));
    return $request;
}

function direction_detail($direction_id, $db)
{
    $request = $db->query(" SELECT * FROM users u INNER JOIN directions d ON u.userId = d.directionAdmin WHERE d.directionId=$direction_id") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request);
}

function number_of_employees($direction_id, $db)
{
    $request = $db->query(" SELECT COUNT(*) as nbr FROM users u INNER JOIN directions d ON u.directionId = d.directionId WHERE u.companyId <> d.directionAdmin AND u.directionId = '$direction_id' ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request)["nbr"];
}

function number_of_files($direction_id, $db)
{
    $request = $db->query(" SELECT COUNT(*) AS nbr FROM users u INNER JOIN files f ON u.userId=f.userId WHERE u.directionId='$direction_id' ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request)["nbr"];
}

function details_of_files($direction_id, $db)
{
    $request = $db->query(" SELECT * FROM users u INNER JOIN files f ON u.userId=f.userId WHERE u.directionId='$direction_id' ") or die(mysqli_error($db));
    return $request;
}

function check_direction_name($name, $db)
{
    $request = $db->query("SELECT * FROM directions d INNER JOIN users u on d.directionAdmin=u.userId WHERE u.companyId = '{$_SESSION["user_company"]}' AND d.directionName = '{$name}'") or die(mysqli_error($db));
    return mysqli_num_rows($request);
}

function create_directions($data, $db)
{
    $db->query("INSERT INTO `directions`( `directionAdmin`, `directionName`, `directionCreatedAt`)" .
        "VALUES ('{$data['director']}','{$data['name']}',now())") or die(mysqli_error($db));

    $id = get_last_inserted_id($db);

    $db->query("UPDATE `users` SET `directionId`='{$id}',`accessId`='{$data['access']}',`isAdminSection`=1,`isWorker`=0 WHERE userId='{$data['director']}'") or die(mysqli_error($db));

    return $id;
}

function user_access($id, $db)
{
    $request = $db->query("SELECT a.accessName from access a INNER JOIN users u on u.accessId=a.accessId WHERE u.userId = $id") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request)["accessName"];
}

function delete_director($id_admin,$id_direction, $db)
{
    $request = $db->query("SELECT companyId FROM users where userId='$id_admin'") or die(mysqli_error($db));
    $company = mysqli_fetch_assoc($request)["companyId"];
    $access_id = employee_access($company, $db);
    $db->query("UPDATE `users` SET `directionId`='0',`accessId`='$access_id',`isAdminSection`=0,`isWorker`=1 WHERE directionId=$id_direction") or die(mysqli_error($db));
}

function delete_direction($id, $db)
{
    $db->query("DELETE FROM `directions` WHERE directionId = '$id'") or die(mysqli_error($db));
}

function direction_by_id($id_direction, $db)
{
    $request = $db->query("SELECT * FROM `directions` WHERE directionId='$id_direction'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request);
}

function direction_admin_access($id_admin, $db)
{
    $request = $db->query("SELECT u.accessId FROM users u INNER JOIN directions d ON d.directionId=u.directionId WHERE u.userId ='$id_admin'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request)["accessId"];
}

function assign_direction_at_user($id_user, $id_direction, $db)
{
    $db->query("UPDATE `users` SET `directionId`='{$id_direction}' WHERE userId=$id_user") or die(mysqli_error($db));
}

function deassign_direction_at_user($id_user, $db)
{
    $db->query(" UPDATE `users` SET `directionId`=0 WHERE userId=$id_user ") or die(mysqli_error($db));
}

function currentdirection_info($id_direction, $db)
{
    $request = $db->query("SELECT * FROM directions d INNER JOIN users u ON d.directionId=u.directionId INNER JOIN access a ON a.accessId=u.accessId WHERE d.directionAdmin=u.userId AND d.directionId='{$id_direction}' ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request);
}


function update_directions($id_direction, $data, $db)
{
    $request =  $db->query("SELECT * FROM `directions` WHERE directionId='{$id_direction}'") or die(mysqli_error($db));
    $id_admin_direction = mysqli_fetch_assoc($request)["directionAdmin"];
    $id_access_employee = employee_access($_SESSION["user_company"], $db);

    //update de l'admin actuelle; 
    $db->query(" UPDATE `users` SET `accessId`='{$id_access_employee}', `directionId`=0,`isAdminSection`=0,`isWorker`=1 WHERE userId='{$id_admin_direction}' ") or die(mysqli_error($db));

    //update de la direction
    $db->query("UPDATE `directions` SET `directionAdmin`='{$data['director']}',`directionName`= '{$data["name"]}' WHERE directionId='{$id_direction}'") or die(mysqli_error($db));

    //update du nouvel admin;
    $db->query(" UPDATE `users` SET `accessId`='{$data['access']}', `directionId`='{$id_direction}',`isAdminSection`=1,`isWorker`= 0 WHERE userId='{$data['director']}' ") or die(mysqli_error($db));

    // $request = $db->query("SELECT * FROM `directions` WHERE directionId='{$id_direction}'") or die(mysqli_error($db));
}

//$db->query("") or die(mysqli_error($db));