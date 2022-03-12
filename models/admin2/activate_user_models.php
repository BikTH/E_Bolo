<?php

function list_unactive_user($company_id, $db)
{
    $list = $db->query(" SELECT * FROM users WHERE companyId='$company_id' AND userStatus='0' AND userCompanyStatus='1' ") or die(mysqli_error($db));
    return $list;
}

function list_of_bann_user($company_id, $db)
{
    $list = $db->query(" SELECT * FROM users WHERE companyId='$company_id' AND userCompanyStatus='0' ") or die(mysqli_error($db));
    return $list;
}

function activate_user_from_company($iduser, $db)
{
    $db->query("UPDATE `users` SET `userStatus` = '1' WHERE `users`.`UserId` ='$iduser'") or die(mysqli_error($db));
}

function bann_user_from_company($iduser, $db)
{
    $db->query("UPDATE `users` SET `userCompanyStatus` = '0' WHERE `users`.`UserId` ='$iduser'") or die(mysqli_error($db));
}

function disban_user_from_company($iduser, $db)
{
    $db->query("UPDATE `users` SET `userCompanyStatus` = '1' WHERE `users`.`UserId` ='$iduser'") or die(mysqli_error($db));
}

function block_user_from_company($iduser, $db)
{
    $db->query("UPDATE `users` SET `userStatus` = '0' WHERE `users`.`UserId` ='$iduser'") or die(mysqli_error($db));
}

function user_information($iduser, $db)
{
    $list = $db->query(" SELECT * FROM users WHERE userId='$iduser'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($list);
}
