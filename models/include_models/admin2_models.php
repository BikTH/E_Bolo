<?php

include 'models/db.php';
include 'models/model.php';
include 'models/admin2/activate_user_models.php';
include 'models/admin2/user_information_models.php';
include 'models/users/register_inc_models.php';
include 'models/admin2/directions_models.php';
include 'models/admin2/employees_models.php';
include 'models/admin2/right_of_access_models.php';
include 'models/admin2/chat_model.php';
include 'models/fpd_model.php';
include 'models/admin2/files_models.php';

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

function user_age($date){
    $date = date_formatter($date, 'Y');
    $age = date('Y') - $date;
    if (date('md') < date('md', strtotime($date))){
        return $age -1;
    }

    return $age;
}
?>