<?php

function check_user_email($email, $db)
{
    $max = $db->query("SELECT * FROM users WHERE userEmail='$email'") or die(mysqli_error($db));
    return mysqli_num_rows($max);
}

function check_user_contact($contact, $db)
{
    $max = $db->query("SELECT * FROM users WHERE UserPhone='$contact'") or die(mysqli_error($db));
    return mysqli_num_rows($max);
}

function check_company_name($name,$db)
{
    $max = $db->query("SELECT * FROM companies WHERE companyName='$name'") or die(mysqli_error($db));
    return mysqli_num_rows($max);
}

function registration_number($id, $db): string
{
    $result = $db->query("SELECT MAX(UserId) as max_id FROM users u INNER JOIN companies c ON u.companyId=c.companyId WHERE u.companyId = '$id'") or die(mysqli_error($db));
    $max = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 0) {
        $max['max_id'] = 1;
    } else {
        $max['max_id'] = $max['max_id'] + 1;
    }

    $regist_number = 'U';

    if (strlen((string) $max['max_id']) == 1) {
        $regist_number = 'U000' . $max['max_id'];
    }
    if (strlen((string) $max['max_id']) == 2) {
        $regist_number = 'U00' . $max['max_id'];
    }
    if (strlen((string) $max['max_id']) == 3) {
        $regist_number = 'U0' . $max['max_id'];
    }
    if (strlen((string) $max['max_id']) >= 4) {
        $regist_number = 'U' . $max['max_id'];
    }
    return $regist_number;
}

function register_inc($data, $db)
{
    $password = md5($data['password']);

    $db->query("INSERT INTO `companies`(`companyName`, `companyStatus`, `companyDescription`, `companySlogan`, `companyAddedAt`) 
    VALUES ('{$data['name_inc']}','1','{$data['description']}', '{$data['slogan']}',now())") or die(mysqli_error($db));

    $last_id = get_last_inserted_id($db);
    $reg = registration_number($last_id, $db);



    $db->query("INSERT INTO `users`(`directionId`,`userCompanyStatus`, `userRegistrationNumber`, `companyId`, `userName`, `userPrename`, `userEmail`, `userPassword`, `userBirthday`, `isAdministrator`, `isAdmin`, `isAdminSection`, `isWorker`, `userStatus`, `userGender`, `userPhone`,`userAddedAt`) 
    VALUES ('0','1','{$reg}','{$last_id}','{$data['name']}','{$data['prename']}','{$data['email']}','{$password}','{$data['birthday']}','0','1','0','0','1','{$data['gender']}','{$data['phone']}',now() )") or die(mysqli_error($db));

    $last_user_id = get_last_inserted_id($db);
    $msg1 = addslashes("Employé de base / basic employee");
    $msg2 = addslashes("Accès à toute les options d'administration / Access to all administrative features");

    $db->query("INSERT INTO `access`( `userId`, `accessName`, `accessDescription`, `activateUser`, `readActivateUser`, `writeActivateUser`, `createActivateUser`, `deleteActivateUser`, `directions`, `readDirections`, `writeDirections`, `createDirections`, `deleteDirections`, `myEmployee`, `readMyEmployee`, `writeMyEmployee`, `createMyEmployee`, `deleteMyEmployee`, `companyFile`, `readCompanyFile`, `writeCompanyFile`, `createCompanyFile`, `deleteCompanyFile`, `rightAccess`, `readRightAccess`, `writeRightAccess`, `createRightAccess`, `deleteRightAccess`, `accessCreatedAt`)"
    ."VALUES ('{$last_user_id}','Employee','{$msg1}',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,now())") or die(mysqli_error($db));

    $db->query("INSERT INTO `access`( `userId`, `accessName`, `accessDescription`, `activateUser`, `readActivateUser`, `writeActivateUser`, `createActivateUser`, `deleteActivateUser`, `directions`, `readDirections`, `writeDirections`, `createDirections`, `deleteDirections`, `myEmployee`, `readMyEmployee`, `writeMyEmployee`, `createMyEmployee`, `deleteMyEmployee`, `companyFile`, `readCompanyFile`, `writeCompanyFile`, `createCompanyFile`, `deleteCompanyFile`, `rightAccess`, `readRightAccess`, `writeRightAccess`, `createRightAccess`, `deleteRightAccess`, `accessCreatedAt`)"
    ."VALUES ('{$last_user_id}','Administrator','{$msg2}',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,now())") or die(mysqli_error($db));

    $access_id = get_last_inserted_id($db);

    $db->query("UPDATE `users` SET `accessId`='{$access_id}' WHERE userId= '$last_user_id'") or die(mysqli_error($db));



    $code = "#" . $last_id . random_bytes(3) . $reg . rand(0, 99);
    $db->query("UPDATE `companies` SET `companyAdmin`='{$last_user_id}', `companyCode`='{$code}'  WHERE companyId=$last_id") or die(mysqli_error($db));

    if (isset($_FILES['image'])) {
        if (is_dir("public/images/Companies/" . $data['name_inc']) === true) {
            if (is_dir("public/images/Companies/" . $data['name_inc'] . "/images") === true) {
                upload_file('image', "public/images/Companies/" . $data['name_inc'] . "/images/" . $_FILES['image']['name']);
            } else {
                if (mkdir("public/images/Companies/" . $data['name_inc'] . "/images", 0700)) {
                    upload_file('image', "public/images/Companies/" . $data['name_inc'] . "/images/" . $_FILES['image']['name']);
                }
            }
        } else {
            if (mkdir("public/images/Companies/" . $data['name_inc'], 0700)) {
                if (mkdir("public/images/Companies/" . $data['name_inc'] . "/images", 0700)) {
                    upload_file('image', "public/images/Companies/" . $data['name_inc'] . "/images/" . $_FILES['image']['name']);
                }
            }
        }

        $db->query("INSERT INTO `images`(`isCompanyBrand`,`userId`, `imageName`, `imageCreatedAt`)"
            . "VALUES('1','{$last_user_id}','{$_FILES['image']['name']}', now())") or die(mysqli_error($db));
    }

    unset($_POST);

     //login_register_inc($data, $db);
}
