<?php


function company_lock()
{
    session_unset();
    session_destroy();
    die('<meta http-equiv="refresh" content="0 ; URL=index.php?page=views/users/login&error=2">');
    exit();
}

function company_status($idcompany, $db)
{
    $request = $db->query("SELECT * FROM companies WHERE companyId='{$idcompany}' AND companyStatus='1'") or die(mysqli_error($db));
    return mysqli_num_rows($request);
}



function login(array $array, $db)
{
    $login = $array["email"];
    $password = $array["password"];
    $request = $db->query("SELECT * FROM users WHERE UserEmail='{$login}'") or die(mysqli_error($db));

    if (mysqli_num_rows($request) == 0) {
        die('<meta http-equiv="refresh" content="0 ; URL=index.php?page=views/users/login&error=1&email=' . $array['email'] . '">');
    } else {

        $result = mysqli_fetch_assoc($request);

        if (hash_equals(hash("MD5", $password), $result["userPassword"])) {

            $_SESSION["connect"] = 1;
            $_SESSION["user_id"] = $result["userId"];
            $_SESSION["user_direction"] = $result["directionId"];
            $_SESSION["user_access"] = $result["accessId"];
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
            $_SESSION["user_status2"] = $result["userCompanyStatus"];
            $_SESSION["user_add_at"] = $result["userAddedAt"];

            unset($_POST);

            if ($_SESSION["is_admin1"] == true) {
                die('<meta http-equiv="refresh" content="0 ; URL=admin1.php">');
            }

            if ($_SESSION["is_admin2"] == true && $_SESSION["user_status"] == true) {
                company_status($_SESSION["user_company"], $db) == 1 ? die('<meta http-equiv="refresh" content="0 ; URL=admin2.php">') :
                die('<meta http-equiv="refresh" content="0 ; URL=index.php?page=views/others/unactive_company">');
            }
            if ($_SESSION["is_admin3"] == true && $_SESSION["user_status"] == true) {
                company_status($_SESSION["user_company"], $db) == 1 ? die('<meta http-equiv="refresh" content="0 ; URL=admin3.php">') : company_lock();
            }
            if ($_SESSION["is_worker"] == true && $_SESSION["user_status"] == true) {
                company_status($_SESSION["user_company"], $db) == 1 ? die('<meta http-equiv="refresh" content="0 ; URL=worker.php">') : company_lock();
            }
            if ($_SESSION["user_status"] != true) {
                company_status($_SESSION["user_company"], $db) == 1 ? die('<meta http-equiv="refresh" content="0 ; URL=index.php?page=views/others/unactive_user">') : company_lock();
            }
        } else {
            die('<meta http-equiv="refresh" content="0 ; URL=views/users/login&email=' . $array['email'] . '&error=1">');
        }
    }
}



function login_register_inc($array, $db)
{
    $login = $array["email"];
    $password = $array["password"];
    $request = $db->query("SELECT * FROM users WHERE UserEmail='{$login}'") or die(mysqli_error($db));

    if (mysqli_num_rows($request) == 0) {
        die('<meta http-equiv="refresh" content="0 ; URL=views/users/login&email=' . $array['email'] . '&error=1">');

        $result = mysqli_fetch_assoc($request);

        if (hash_equals(hash("MD5", $password), $result["userPassword"])) {
            $_SESSION["connect"] = 1;
            $_SESSION["user_id"] = $result["userId"];
            $_SESSION["user_direction"] = $result["directionId"];
            $_SESSION["user_access"] = $result["accessId"];
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
            $_SESSION["user_status2"] = $result["userCompanyStatus"];
            $_SESSION["user_add_at"] = $result["userAddedAt"];

            unset($_POST);

            if ($_SESSION["is_admin2"] == true) {
                company_status($_SESSION["user_company"], $db) == 1 ?
                    die('<meta http-equiv="refresh" content="0 ; URL=admin2.php?page=views/admin2/home_admin2&success=1">')
                    : die('<meta http-equiv="refresh" content="0 ; URL=index.php?page=views/others/unactive_company">');
            }
        } else {
            die('<meta http-equiv="refresh" content="0 ; URL=index.php?page=views/users/login&error=1&email=' . $array['email'] . '">');
        }
    }
}

function login_register($array, $db)
{
    $login = $array["email"];
    $password = $array["password"];
    $request = $db->query("SELECT * FROM users WHERE UserEmail='{$login}'") or die(mysqli_error($db));

    if (mysqli_num_rows($request) == 0) {
        die('<meta http-equiv="refresh" content="0 ; URL=views/users/login&email=' . $array['email'] . '&error=1">');
    } else {

        $result = mysqli_fetch_assoc($request);

        if (hash_equals(hash("MD5", $password), $result["userPassword"])) {

            $_SESSION["connect"] = 1;
            $_SESSION["user_id"] = $result["userId"];
            $_SESSION["user_direction"] = $result["directionId"];
            $_SESSION["user_access"] = $result["accessId"];
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
            $_SESSION["user_status2"] = $result["userCompanyStatus"];
            $_SESSION["user_add_at"] = $result["userAddedAt"];

            unset($_POST);

            if ($_SESSION["user_status"] != true) {
                company_status($_SESSION["user_company"], $db) == 1 ? die('<meta http-equiv="refresh" content="0 ; URL=index.php?page=views/others/unactive_user&success=1">') : company_lock();
            }
        } else {
            die('<meta http-equiv="refresh" content="0 ; URL=views/users/login&email=' . $array['email'] . '&error=1">');
        }
    }
}
