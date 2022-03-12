<?php

if (!isset($_SESSION["language_is_define"])) {
    $_SESSION["language_global"] = 0;
}

function set_online($db)
{
    $db->query("UPDATE `users` SET `isConnect`=1 WHERE userId = '{$_SESSION["user_id"]}' ") or die(mysqli_error($db));
}

function set_offline($db)
{
    $db->query("UPDATE `users` SET `isConnect`=0 WHERE userId = '{$_SESSION["user_id"]}' ") or die(mysqli_error($db));
}


/**
 * 
 * @param type $date
 * @param type $format
 * @return type
 */
function date_formatter($date, $format = null)
{
    $date_to_format = new DateTime($date);
    if ($format !== null) {
        return date_format($date_to_format, $format);
    } else {
        return date_format($date_to_format, 'l j F Y h:i:s A');
    }
}

/**
 * 
 * @param type $file
 * @param type $destination
 * @return type
 */
function upload_file($file, $destination)
{
    if (isset($_FILES[$file]) and $_FILES[$file]['error'] === 0) {

        if ($_FILES[$file]['size'] <= 200000) {

            $infosphoto = pathinfo($_FILES[$file]['name']);
            $extension_img = $infosphoto['extension'];
            $ext_valid = array('jpg', 'JPEG', 'gif', 'GIF', 'png', 'PNG', 'jpeg', 'JPG');

            if (in_array($extension_img, $ext_valid)) {

                return move_uploaded_file($_FILES[$file]['tmp_name'], $destination);
            } else {
                echo "<script language='javascript'>alert('Extension non autorisée')</script>";
            }
        } else {
            echo "<script language='javascript'>alert('Image trop grande choisissez une autre')</script> ";
        }
    } else {
        echo "<script language='javascript'>alert('Veuillez charger cette image elle et erronee')</script> ";
    }
}

function image_error($file)
{
    if ($_FILES[$file]['error'] === 0) {
        return false;
    } else {
        return true;
    }
}

function image_size($file)
{
    if ($_FILES[$file]['size'] <= 200000) {
        return false;
    } else {
        return true;
    }
}

function image_extension($file)
{

    $infosphoto = pathinfo($_FILES[$file]['name']);
    $extension_img = $infosphoto['extension'];
    $ext_valid = array('jpg', 'JPEG', 'gif', 'GIF', 'png', 'PNG', 'jpeg', 'JPG');

    if (in_array($extension_img, $ext_valid)) {
        return false;
    } else {
        return true;
    }
}

function upload_files($file, $destination)
{
    if (isset($_FILES[$file]) and $_FILES[$file]['error'] === 0) {

        if ($_FILES[$file]['size'] <= 20000000) {

            $infosphoto = pathinfo($_FILES[$file]['name']);
            $extension_img = $infosphoto['extension'];
            $ext_valid = array('txt', 'jpeg', 'JPEG', 'jpg', 'JPG', 'gif', 'GIF', 'png', 'PNG', 'doc', 'DOC', 'docx', 'DOCX', 'xls', 'XLS', 'xlsx', 'XLSX', 'pdf', 'PDF', 'zip', 'ZIP', 'rar', 'RAR', 'pptx', 'PPTX', 'pptm', 'PPTM');

            if (in_array($extension_img, $ext_valid)) {

                return move_uploaded_file($_FILES[$file]['tmp_name'], $destination);
            } else {
                $error_content = what_langauge() == 0 ? "Extension non autorisée !" : " Unauthorize extension!";
                require 'views/admin2/files_worker/upload_files.php';
            }
        } else {
            $error_content = what_langauge() == 0 ? "Fichier trop grand !" : " File too big !";
            require 'views/admin2/files_worker/upload_files.php';
        }
    } else {
        $error_content = what_langauge() == 0 ? "Fichier érroné !" : "uncorrect File !";
        require 'views/admin2/files_worker/upload_files.php';
    }
}


function file_error($file)
{
    if ($_FILES[$file]['error'] === 0) {
        return false;
    } else {
        return true;
    }
}

function file_size($file)
{
    if ($_FILES[$file]['size'] <= 20000000) {
        return false;
    } else {
        return true;
    }
}

function file_extension($file)
{

    $infosphoto = pathinfo($_FILES[$file]['name']);
    $extension_img = $infosphoto['extension'];
    $ext_valid = array('txt', 'jpeg', 'JPEG', 'jpg', 'JPG', 'gif', 'GIF', 'png', 'PNG', 'doc', 'DOC', 'docx', 'DOCX', 'xls', 'XLS', 'xlsx', 'XLSX', 'pdf', 'PDF', 'zip', 'ZIP', 'rar', 'RAR', 'pptx', 'PPTX', 'pptm', 'PPTM');

    if (in_array($extension_img, $ext_valid)) {
        return false;
    } else {
        return true;
    }
}

/**
 * 
 * @param type $connect
 * @return type
 */
function get_last_inserted_id($connect)
{
    $request = $connect->query("SELECT last_insert_id() as last_id") or die(mysqli_error($connect));
    $result = mysqli_fetch_assoc($request);
    return $result['last_id'];
}

function is_login1()
{
    if (isset($_SESSION["connect"]) && $_SESSION["connect"] == 1) {
        return 1;
    } else {
        return 0;
    }
}

function is_login2($db)
{
    if (isset($_SESSION["connect"]) && $_SESSION["connect"] == 1) {
        if ($_SESSION['is_admin1'] != true) :
            if ($_SESSION['is_admin2'] != true) :
                if ($_SESSION['is_admin3'] != true) :
                    if ($_SESSION['is_worker'] != true) :

                    else :
                        if ($_SESSION['user_status'] != true) :
                            company_status($_SESSION["user_company"], $db) == 1 ? header("location:index.php?page=views/others/unactive_user") : company_lock();
                        else :
                            company_status($_SESSION["user_company"], $db) == 1 ? header("location:worker.php") : company_lock();
                        endif;
                    endif;
                else :
                    if ($_SESSION['user_status'] != true) :
                        company_status($_SESSION["user_company"], $db) == 1 ? header("location:index.php?page=views/others/unactive_user") : company_lock();
                    else :
                        company_status($_SESSION["user_company"], $db) == 1 ? header("location:admin3.php") : company_lock();
                    endif;
                endif;
            else :
                if ($_SESSION['user_status'] != true) :
                    company_status($_SESSION["user_company"], $db) == 1 ? header("location:index.php?page=views/others/unactive_user") : company_lock();
                else :
                    company_status($_SESSION["user_company"], $db) == 1 ? header("location:admin2.php") : company_lock();
                endif;
            endif;
        else :
            if ($_SESSION['user_status'] != true) :
                header("location:index.php?page=views/others/unactive_user");
            else :
                header("location:admin1.php");
            endif;
        endif;
    }
}

function is_login3($db)
{
    if (isset($_SESSION["user_status"]) && $_SESSION["user_status"] == 1) {
        if ($_SESSION['is_admin1'] != true) :
            if ($_SESSION['is_admin2'] != true) :
                if ($_SESSION['is_admin3'] != true) :
                    if ($_SESSION['is_worker'] != true) :

                    else :
                        if ($_SESSION['user_status'] != true) :
                            company_status($_SESSION["user_company"], $db) == 1 ? header("location:index.php?page=views/others/unactive_user") : company_lock();
                        else :
                            company_status($_SESSION["user_company"], $db) == 1 ? header("location:worker.php") : company_lock();
                        endif;
                    endif;
                else :
                    if ($_SESSION['user_status'] != true) :
                        company_status($_SESSION["user_company"], $db) == 1 ? header("location:index.php?page=views/others/unactive_user") : company_lock();
                    else :
                        company_status($_SESSION["user_company"], $db) == 1 ? header("location:admin3.php") : company_lock();
                    endif;
                endif;
            else :
                if ($_SESSION['user_status'] != true) :
                    company_status($_SESSION["user_company"], $db) == 1 ? header("location:index.php?page=views/others/unactive_user") : company_lock();
                else :
                    company_status($_SESSION["user_company"], $db) == 1 ? header("location:admin2.php") : company_lock();
                endif;
            endif;
        else :
            if ($_SESSION['user_status'] != true) :
                header("location:index.php?page=views/others/unactive_user");
            else :
                header("location:admin1.php");
            endif;
        endif;
    }
}

function what_langauge()
{
    if ($_SESSION["language_global"] == 0) {
        return 0;
    } else {
        return 1;
    }
}

function change_language($lang, $curent_page)
{
    $_SESSION["language_is_define"] = 0;
    $_SESSION["language_global"] = $lang;
    die('<meta http-equiv="refresh" content="0 ; URL=' . $curent_page . '">');
}

function language_content($fr_content, $en_content)
{
    echo what_langauge() == 0 ? $fr_content : $en_content;
}

function user_avatar($db)
{
    if (check_user_avatar($_SESSION["user_id"], $db) == 0) :
        if ($_SESSION["user_gender"] == "Masculin") {
            return "public/images/user/avatar1.png";
        } else {
            return "public/images/user/avatar6.png";
        }
    else :
        return "public/images/companies/" . find_company_name($_SESSION["user_company"], $db) . "/users/" . $_SESSION["user_name"] . " " . $_SESSION["user_prename"] . "/avatar/" . select_user_avatar($_SESSION["user_id"], $db);
    endif;
}

function user_avatar_by_id($tab, $db)
{
    if (check_user_avatar($tab["userId"], $db) == 0) :
        if ($tab["userGender"] == "Masculin") {
            return "public/images/user/avatar1.png";
        } else {
            return "public/images/user/avatar6.png";
        }
    else :
        return "public/images/companies/" . find_company_name($tab["userCompany"], $db) . "/users/" . $tab["userName"] . " " . $tab["userPrename"] . "/avatar/" . select_user_avatar($tab["userId"], $db);
    endif;
}

function user_avatar_by_id2($tab, $db)
{
    if (check_user_avatar($tab["userId"], $db) == 0) :
        if ($tab["userGender"] == "Masculin") {
            return "public/images/user/avatar1.png";
        } else {
            return "public/images/user/avatar6.png";
        }
    else :
        return "public/images/companies/" . find_company_name($tab["companyId"], $db) . "/users/" . $tab["userName"] . " " . $tab["userPrename"] . "/avatar/" . select_user_avatar($tab["userId"], $db);
    endif;
}

function company_brand_image($db)
{
    if (check_company_image($_SESSION["user_company"], $db) == 0) :
        
    else :
        return "public/images/companies/" . find_company_name($_SESSION["user_company"], $db) . "/images/" . select_company_avatar($_SESSION["user_company"], $db);
    endif;
}

function reload_session_info($db)
{
    if (isset($_SESSION["user_id"])) {
        $request = $db->query("SELECT * FROM users WHERE UserId='{$_SESSION["user_id"]}'") or die(mysqli_error($db));
        $result = mysqli_fetch_assoc($request);

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
    }
}

function worker_access($user_id, $db)
{
    $request = $db->query("SELECT a.accessId As access_id, a.userId, a.accessName As name, a.accessDescription As description, a.activateUser As non1, a.readActivateUser AS u1, a.writeActivateUser AS u2, a.createActivateUser AS u3, a.deleteActivateUser AS u4, a.directions AS non2, a.readDirections AS d1, a.writeDirections AS d2, a.createDirections AS d3, a.deleteDirections AS d4, a.myEmployee AS non3, a.readMyEmployee AS e1, a.writeMyEmployee AS e2, a.createMyEmployee AS e3, a.deleteMyEmployee AS e4, a.companyFile AS non4, a.readCompanyFile AS f1, a.writeCompanyFile AS f2, a.createCompanyFile AS f3, a.deleteCompanyFile AS f4, a.rightAccess AS non5, a.readRightAccess AS a1, a.writeRightAccess AS a2, a.createRightAccess AS a3, a.deleteRightAccess AS a4, a.accessCreatedAt FROM `access` a INNER JOIN users u ON u.accessId=a.accessId WHERE u.userId='$user_id'") or die(mysqli_error($db));
    return $request;
}

function employee_access($id_company, $db)
{
    $msgx = "Employee";
    $request = $db->query("SELECT a.accessId as id FROM access a INNER JOIN users u on u.userId=a.userId INNER JOIN companies c ON c.companyId=u.companyId WHERE c.companyId = '{$id_company}' AND a.accessName ='$msgx'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request)["id"];
}

function administrator_access($id_company, $db)
{
    $msgx = "Administrator";
    $request = $db->query("SELECT a.accessId as id FROM access a INNER JOIN users u on u.userId=a.userId INNER JOIN companies c ON c.companyId=u.companyId WHERE c.companyId = '$id_company' AND a.accessName ='$msgx'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request)["id"];
}

function count_employee($db)
{
    $request = $db->query("SELECT * FROM `users` WHERE userStatus=1 AND companyId='{$_SESSION["user_company"]}'") or die(mysqli_error($db));
    return mysqli_num_rows($request);
}

function count_direction($db)
{
    $request = $db->query("SELECT * FROM `directions` d INNER JOIN users u ON d.directionAdmin=u.userId WHERE u.companyId='{$_SESSION["user_company"]}'") or die(mysqli_error($db));
    return mysqli_num_rows($request);
}

function count_files($db)
{
    $request = $db->query("SELECT * FROM `files` f INNER JOIN users u ON u.userId=f.userId WHERE u.companyId='{$_SESSION["user_company"]}'") or die(mysqli_error($db));
    return mysqli_num_rows($request);
}

function admin($db)
{
    $request = $db->query("SELECT `companyAdmin` FROM `companies` WHERE companyId='{$_SESSION["user_company"]}' ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request)["companyAdmin"];
}

function count_online_employee($db)
{
    $request = $db->query("SELECT * FROM `users` WHERE companyId='{$_SESSION["user_company"]}' AND isConnect=1") or die(mysqli_error($db));
    return mysqli_num_rows($request);
}

function info_direction($db)
{
    $request = $db->query("SELECT * FROM `directions` WHERE directionId='{$_SESSION["user_direction"]}'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request);
}

function update_new_position_company($new_name,  $db)
{
    $request = $db->query("SELECT * FROM files f INNER JOIN users u ON f.userId=u.userId WHERE u.companyId = '{$_SESSION["user_company"]}' ") or die(mysqli_error($db));

    while ($user = mysqli_fetch_assoc($request)) :

        $db->query("UPDATE `files` SET `filePosition`=[value-6] WHERE fileId= '{$user["fileId"]}'") or die(mysqli_error($db));

    endwhile;
}

function update_new_position_user($db)
{
    $request = $db->query("SELECT * FROM files WHERE userId = '{$_SESSION["user_id"]}' ") or die(mysqli_error($db));

    while ($user = mysqli_fetch_assoc($request)) :

        $company_name = find_company_name($_SESSION["user_company"], $db);
        $user_file = $_SESSION["user_name"] . " " . $_SESSION["user_prename"];

        $adrs1 = "public/images/Companies/" . $company_name;
        $adrs2 = $adrs1 . "/users";
        $adrs3 = $adrs2 . "/" . $user_file;
        $adrs4 = $adrs3 . "/files";
        $info = new SplFileInfo($user["filePosition"]);
        $adrs5 = $adrs4 . "/" . $info->getFilename();

        $db->query("UPDATE `files` SET `filePosition`='{$adrs5}' WHERE fileId= '{$user["fileId"]}'") or die(mysqli_error($db));

    endwhile;
}
