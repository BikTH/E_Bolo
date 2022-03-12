<?php

function update_avatar($data, $db)
{

    $company_name = find_company_name($_SESSION["user_company"], $db);
    $user_file = $_SESSION["user_name"] . " " . $_SESSION["user_prename"];

    $adrs1 = "public/images/Companies/" . $company_name;
    $adrs2 = $adrs1 . "/users";
    $adrs3 = $adrs2 . "/" . $user_file;
    $adrs4 = $adrs3 . "/avatar";
    $adrs5 = $adrs4 . "/" . $_FILES['image']['name'];

    if (is_dir($adrs1) === true) {

        if (is_dir($adrs2) === true) {

            if (is_dir($adrs3) === true) {

                if (is_dir($adrs4) === true) {
                    upload_file('image', $adrs5);
                } else {
                    if (mkdir($adrs4, 0700)) {
                        upload_file('image', $adrs5);
                    }
                }
            } else {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_file('image', $adrs5);
                    }
                }
            }
        } else {
            if (mkdir($adrs2, 0700)) {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_file('image', $adrs5);
                    }
                }
            }
        }
    } else {
        if (mkdir($adrs1, 0700)) {
            if (mkdir($adrs2, 0700)) {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_file('image', $adrs5);
                    }
                }
            }
        }
    }
    if (check_user_avatar($_SESSION["user_id"], $db) == 0) :
        $db->query("INSERT INTO `images`(`isAvatar`,`userId`, `imageName`, `imageCreatedAt`)"
            . "VALUES('1','{$_SESSION["user_id"]}','{$_FILES['image']['name']}', now())") or die(mysqli_error($db));
    else :
        $test = $db->query("SELECT imageId FROM images WHERE userId='{$_SESSION["user_id"]}' AND isAvatar='1'") or die(mysqli_error($db));
        $test2 = mysqli_fetch_assoc($test);
        $db->query("UPDATE `images` SET `userId`='{$_SESSION["user_id"]}',`imageName`='{$_FILES['image']['name']}',`imageCreatedAt`=now() WHERE imageId ='{$test2["imageId"]}'") or die(mysqli_error($db));
    endif;
}

function update_user_informations($data, $db)
{
    $company_name = find_company_name($_SESSION["user_company"], $db);
    $user_file = $_SESSION["user_name"] . " " . $_SESSION["user_prename"];

    $adrs1 = "public/images/Companies/" . $company_name;
    $adrs2 = $adrs1 . "/users";
    $adrs3 = $adrs2 . "/" . $user_file;

    $db->query("UPDATE `users` SET `userName`='{$data["name"]}',`userPrename`='{$data["prename"]}',`userEmail`='{$data["email"]}',`userBirthday`='{$data["birthday"]}',`userGender`='{$data["gender"]}',`userPhone`='{$data["phone"]}' WHERE userId = '{$_SESSION["user_id"]}'") or die(mysqli_error($db));
    $request = $db->query("SELECT * FROM users WHERE UserId='{$_SESSION["user_id"]}'") or die(mysqli_error($db));
    $result = mysqli_fetch_assoc($request);

    $_SESSION["connect"] = 1;
    $_SESSION["user_id"] = $result["userId"];
    $_SESSION["user_name"] = $result["userName"];
    $_SESSION["user_prename"] = $result["userPrename"];
    $_SESSION["user_phone"] = $result["userPhone"];
    $_SESSION["user_email"] = $result["userEmail"];
    $_SESSION["user_birthday"] = $result["userBirthday"];
    $_SESSION["user_gender"] = $result["userGender"];
    $_SESSION["user_company"] = $result["companyId"];
    $_SESSION["is_admin1"] = $result["isAdministrator"];
    $_SESSION["is_admin2"] = $result["isAdmin"];
    $_SESSION["is_admin3"] = $result["isAdminSection"];
    $_SESSION["is_worker"] = $result["isWorker"];
    $_SESSION["reg_number"] = $result["userRegistrationNumber"];
    $_SESSION["user_status"] = $result["userStatus"];
    $_SESSION["user_add_at"] = $result["userAddedAt"];

    $user_file_2 = $_SESSION["user_name"] . " " . $_SESSION["user_prename"];
    $adrs3_2 = $adrs2 . "/" . $user_file_2;

    rename($adrs3 , $adrs3_2 );

    unset($_POST);
}
