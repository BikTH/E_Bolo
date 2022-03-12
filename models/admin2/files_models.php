<?php

function check_file_name($name, $db)
{
    $request = $db->query(" SELECT * FROM `files` f inner join users u on u.userId=f.userId WHERE u.userId='{$_SESSION["user_id"]}' AND f.fileName ='{$name}' ") or die(mysqli_fetch_assoc($db));
    return mysqli_num_rows($request);
}

function file_folder($db)
{
    $company_name = find_company_name($_SESSION["user_company"], $db);
    $user_file = $_SESSION["user_name"] . " " . $_SESSION["user_prename"];

    $adrs1 = "public/images/Companies/" . $company_name;
    $adrs2 = $adrs1 . "/users";
    $adrs3 = $adrs2 . "/" . $user_file;
    $adrs4 = $adrs3 . "/files";

    if (is_dir($adrs1) === true) {

        if (is_dir($adrs2) === true) {

            if (is_dir($adrs3) === true) {

                if (is_dir($adrs4) === true) {

                    return $adrs4;
                } else {
                    if (mkdir($adrs4, 0700)) {

                        return $adrs4;
                    }
                }
            } else {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        return $adrs4;
                    }
                }
            }
        } else {
            if (mkdir($adrs2, 0700)) {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        return $adrs4;
                    }
                }
            }
        }
    } else {
        if (mkdir($adrs1, 0700)) {
            if (mkdir($adrs2, 0700)) {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        return $adrs4;
                    }
                }
            }
        }
    }
}

function save_file($name, $db)
{
    $company_name = find_company_name($_SESSION["user_company"], $db);
    $user_file = $_SESSION["user_name"] . " " . $_SESSION["user_prename"];

    $adrs1 = "public/images/Companies/" . $company_name;
    $adrs2 = $adrs1 . "/users";
    $adrs3 = $adrs2 . "/" . $user_file;
    $adrs4 = $adrs3 . "/files";
    $adrs5 = $adrs4 . "/" . $_FILES['files']['name'];

    if (is_dir($adrs1) === true) {

        if (is_dir($adrs2) === true) {

            if (is_dir($adrs3) === true) {

                if (is_dir($adrs4) === true) {
                    upload_files('files', $adrs5);
                } else {
                    if (mkdir($adrs4, 0700)) {
                        upload_files('files', $adrs5);
                    }
                }
            } else {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_files('files', $adrs5);
                    }
                }
            }
        } else {
            if (mkdir($adrs2, 0700)) {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_files('files', $adrs5);
                    }
                }
            }
        }
    } else {
        if (mkdir($adrs1, 0700)) {
            if (mkdir($adrs2, 0700)) {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_files('files', $adrs5);
                    }
                }
            }
        }
    }

    $db->query(" INSERT INTO `files`(`userId`, `fIleName`, `filePosition`, `fileCreatedAt`)" .
        "VALUES ('{$_SESSION["user_id"]}','{$name}','{$adrs5}',now()) ") or die(mysqli_fetch_assoc($db));
}

function edit_file($id_file, $db)
{
    $request = $db->query(" SELECT * FROM files WHERE fileId = $id_file ") or die(mysqli_fetch_assoc($db));
    $delete = mysqli_fetch_assoc($request)["filePosition"];
    unlink($delete);

    $company_name = find_company_name($_SESSION["user_company"], $db);
    $user_file = $_SESSION["user_name"] . " " . $_SESSION["user_prename"];

    $adrs1 = "public/images/Companies/" . $company_name;
    $adrs2 = $adrs1 . "/users";
    $adrs3 = $adrs2 . "/" . $user_file;
    $adrs4 = $adrs3 . "/files";
    $adrs5 = $adrs4 . "/" . $_FILES['files']['name'];

    if (is_dir($adrs1) === true) {

        if (is_dir($adrs2) === true) {

            if (is_dir($adrs3) === true) {

                if (is_dir($adrs4) === true) {
                    upload_files('files', $adrs5);
                } else {
                    if (mkdir($adrs4, 0700)) {
                        upload_files('files', $adrs5);
                    }
                }
            } else {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_files('files', $adrs5);
                    }
                }
            }
        } else {
            if (mkdir($adrs2, 0700)) {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_files('files', $adrs5);
                    }
                }
            }
        }
    } else {
        if (mkdir($adrs1, 0700)) {
            if (mkdir($adrs2, 0700)) {
                if (mkdir($adrs3, 0700)) {
                    if (mkdir($adrs4, 0700)) {
                        upload_files('files', $adrs5);
                    }
                }
            }
        }
    }
    $db->query(" UPDATE `files` SET `fileUpdatedAt`=now(), `filePosition`='{$adrs5}' WHERE fileId = $id_file ") or die(mysqli_fetch_assoc($db));
}

function My_file($db)
{
    $request = $db->query(" SELECT * FROM `files` WHERE userId='{$_SESSION["user_id"]}' ") or die(mysqli_fetch_assoc($db));
    return $request;
}

function Company_files($db)
{
    $request = $db->query(" SELECT * FROM `files` f INNER JOIN users u ON f.userId = u.userId WHERE u.companyId='{$_SESSION["user_company"]}' ") or die(mysqli_fetch_assoc($db));
    return $request;
}

function type_of_file($extension)
{
    if ($extension == "jpeg" || $extension == "JPEG" || $extension == "jpg" || $extension == "JPG" || $extension == "gif" || $extension == "GIF" || $extension == "png"  || $extension == "PNG") {
        return "public/images/image.png";
    }

    if ($extension == "doc" || $extension == "DOC" || $extension == "docx" || $extension == "DOCX") {
        return "public/images/word.jpg";
    }

    if ($extension == "xls" || $extension == "xlsx" || $extension == "XLS" || $extension == "XLSX") {
        return "public/images/excell.png";
    }

    if ($extension == "pptx" || $extension == "PPTX" || $extension == "pptm" || $extension == "PPTM") {
        return "public/images/ppoint.png";
    }

    if ($extension == "pdf" || $extension == "PDF") {
        return "public/images/pdf.jpg";
    }

    if ($extension == "zip" || $extension == "ZIP") {
        return "public/images/zip.jpg";
    }

    if ($extension == "rar" || $extension == "RAR") {
        return "public/images/rar.png";
    }

    if ($extension == "txt" || $extension == "TXT") {
        return "public/images/txt.jpg";
    }
}

function name_of_type($extension)
{
    if ($extension == "jpeg" || $extension == "JPEG" || $extension == "jpg" || $extension == "JPG" || $extension == "gif" || $extension == "GIF" || $extension == "png"  || $extension == "PNG") {
        return "IMAGE";
    }

    if ($extension == "doc" || $extension == "DOC" || $extension == "docx" || $extension == "DOCX") {
        return "DOCUMENT WORD";
    }

    if ($extension == "xls" || $extension == "xlsx" || $extension == "XLS" || $extension == "XLSX") {
        return "DOCUMENT EXCELL";
    }

    if ($extension == "pptx" || $extension == "PPTX" || $extension == "pptm" || $extension == "PPTM") {
        return "Power-Point";
    }

    if ($extension == "pdf" || $extension == "PDF") {
        return "PDF";
    }

    if ($extension == "zip" || $extension == "ZIP") {
        return "ZIP";
    }

    if ($extension == "rar" || $extension == "RAR") {
        return "RAR";
    }

    if ($extension == "txt" || $extension == "TXT") {
        return "FICHIER TEXTE";
    }
}

function get_file_info($id_file, $db)
{
    $request = $db->query(" SELECT * FROM files WHERE fileId = $id_file ") or die(mysqli_fetch_assoc($db));
    return mysqli_fetch_assoc($request);
}

function delete_file($id_file, $db)
{
    $request = $db->query(" SELECT * FROM files WHERE fileId = $id_file ") or die(mysqli_fetch_assoc($db));
    $delete = mysqli_fetch_assoc($request)["filePosition"];
    unlink($delete);
    $db->query(" DELETE FROM `files` WHERE fileId = $id_file AND fileuser = null  ") or die(mysqli_fetch_assoc($db));
}

//$db->query(" ")or die(mysqli_fetch_assoc($db));