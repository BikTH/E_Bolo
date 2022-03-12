<?php

include 'models/db.php';
include 'models/model.php';
include 'models/users/register_inc_models.php';
include 'models/users/register_models.php';
include 'models/users/login_models.php';

function check_company_image($id,$db){
    $test = $db->query("select imageName from images i INNER JOIN companies c ON c.companyAdmin = i.userId WHERE c.companyId = $id AND i.isCompanyBrand = 1") or die(mysqli_error($db));
    return mysqli_num_rows($test);
}

function select_company_avatar($id,$db){
    $test = $db->query("select imageName from images i INNER JOIN companies c ON c.companyAdmin = i.userId WHERE c.companyId = $id AND i.isCompanyBrand = 1") or die(mysqli_error($db));
    return mysqli_fetch_assoc($test)["imageName"];
}

function find_company_name($id,$db){
    $test = $db->query("SELECT companyName FROM companies WHERE companyId='$id'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($test)["companyName"];
}

function check_user_avatar($id,$db){
    $test = $db->query("SELECT * FROM images WHERE userId='$id' AND isAvatar='1'") or die(mysqli_error($db));
    return mysqli_num_rows($test);
}


function select_user_avatar($id,$db){
    $test = $db->query("SELECT * FROM images WHERE userId='$id' AND isAvatar='1'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($test)["imageName"];
}

function company_admin_id($db){
    $request = $db->query("SELECT `companyAdmin` FROM `companies` WHERE companyId='{$_SESSION["user_company"]}'")or die(mysqli_error($db));
    return mysqli_fetch_assoc($request)["companyAdmin"];
}

function send_contact($data, $db){
    $admin =company_admin_id($db);
    $db->query("INSERT INTO `contact`(`userId`, `contactReceiver`, `contactContent`, `contactCreatedAt`) 
    VALUES ('{$_SESSION["user_id"]}','{$admin}','{$data["message"]}',now())")or die(mysqli_error($db));
}