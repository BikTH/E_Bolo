<?php
session_start();
include 'models/include_models/index_models.php';
is_login3($db);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | E - Bolo</title>
    <link rel="icon" type="image/x-icon" href="public/images/LogoApp.ico">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/sweetalert/package/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/DataTables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="public/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="public/font/css/all.css">

    <!-- <link rel="stylesheet" type="text/css" href="public/assets/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap-datetimepicker.min.css"> -->

    <!-- <link rel="stylesheet" href="public/frame_work/sweetalert2/sweetalert2.css" crossorigin="anonymous">

    <link rel="stylesheet" href="public/frame_work/jquery2/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="public/frame_work/jquery2/jquery-ui-1.12.1/completion.css">

    <link rel="stylesheet" href="public/bootstrapselect/css/bootstrap-select.min.css"> -->
</head>

<style>
    body {
        background-color: #fefcff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg %3E%3Cpath fill='%23dad5dd' d='M486 705.8c-109.3-21.8-223.4-32.2-335.3-19.4C99.5 692.1 49 703 0 719.8V800h843.8c-115.9-33.2-230.8-68.1-347.6-92.2C492.8 707.1 489.4 706.5 486 705.8z'/%3E%3Cpath fill='%23b6b0bc' d='M1600 0H0v719.8c49-16.8 99.5-27.8 150.7-33.5c111.9-12.7 226-2.4 335.3 19.4c3.4 0.7 6.8 1.4 10.2 2c116.8 24 231.7 59 347.6 92.2H1600V0z'/%3E%3Cpath fill='%23948c9c' d='M478.4 581c3.2 0.8 6.4 1.7 9.5 2.5c196.2 52.5 388.7 133.5 593.5 176.6c174.2 36.6 349.5 29.2 518.6-10.2V0H0v574.9c52.3-17.6 106.5-27.7 161.1-30.9C268.4 537.4 375.7 554.2 478.4 581z'/%3E%3Cpath fill='%23736a7d' d='M0 0v429.4c55.6-18.4 113.5-27.3 171.4-27.7c102.8-0.8 203.2 22.7 299.3 54.5c3 1 5.9 2 8.9 3c183.6 62 365.7 146.1 562.4 192.1c186.7 43.7 376.3 34.4 557.9-12.6V0H0z'/%3E%3Cpath fill='%2354495f' d='M181.8 259.4c98.2 6 191.9 35.2 281.3 72.1c2.8 1.1 5.5 2.3 8.3 3.4c171 71.6 342.7 158.5 531.3 207.7c198.8 51.8 403.4 40.8 597.3-14.8V0H0v283.2C59 263.6 120.6 255.7 181.8 259.4z'/%3E%3Cpath fill='%234e4557' d='M1600 0H0v136.3c62.3-20.9 127.7-27.5 192.2-19.2c93.6 12.1 180.5 47.7 263.3 89.6c2.6 1.3 5.1 2.6 7.7 3.9c158.4 81.1 319.7 170.9 500.3 223.2c210.5 61 430.8 49 636.6-16.6V0z'/%3E%3Cpath fill='%2348414e' d='M454.9 86.3C600.7 177 751.6 269.3 924.1 325c208.6 67.4 431.3 60.8 637.9-5.3c12.8-4.1 25.4-8.4 38.1-12.9V0H288.1c56 21.3 108.7 50.6 159.7 82C450.2 83.4 452.5 84.9 454.9 86.3z'/%3E%3Cpath fill='%23423e46' d='M1600 0H498c118.1 85.8 243.5 164.5 386.8 216.2c191.8 69.2 400 74.7 595 21.1c40.8-11.2 81.1-25.2 120.3-41.7V0z'/%3E%3Cpath fill='%233c3a3e' d='M1397.5 154.8c47.2-10.6 93.6-25.3 138.6-43.8c21.7-8.9 43-18.8 63.9-29.5V0H643.4c62.9 41.7 129.7 78.2 202.1 107.4C1020.4 178.1 1214.2 196.1 1397.5 154.8z'/%3E%3Cpath fill='%23363636' d='M1315.3 72.4c75.3-12.6 148.9-37.1 216.8-72.4h-723C966.8 71 1144.7 101 1315.3 72.4z'/%3E%3C/g%3E%3C/svg%3E");
        background-attachment: fixed;
        background-size: cover;
    }
</style>

<!-- <style>
    body {
        background-color: #2e1f26;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='71' height='71' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='100' y1='33' x2='100' y2='-3'%3E%3Cstop offset='0' stop-color='%23000' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23000' stop-opacity='1'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='100' y1='135' x2='100' y2='97'%3E%3Cstop offset='0' stop-color='%23000' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23000' stop-opacity='1'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill='%23271a20' %3E%3Crect x='100' width='100' height='100'/%3E%3Crect y='100' width='100' height='100'/%3E%3C/g%3E%3Cg fill-opacity='1'%3E%3Cpolygon fill='url(%23a)' points='100 30 0 0 200 0'/%3E%3Cpolygon fill='url(%23b)' points='100 100 0 130 0 100 200 100 200 130'/%3E%3C/g%3E%3C/svg%3E");
    }
</style> -->

<body class="body2 text-light" id="top_index">

    <?php

    if (!isset($page)) :
        $page = "views/index/home_index.php";
    endif; ?>

    <div class="content">
        <?php
        if (isset($_REQUEST["page"])) {
            $page = $_REQUEST['page'] . ".php";

            if (file_exists($page)) {
                include($page);
            } else {
                include('views/404.php');
            }
        } else {
            include('views/index/home_index.php');
        }
        ?>
    </div>

    <?php include('views/footer/footer_index.php') ?>


    <script type="text/javascript" src="public/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="public/sweetalert/package/dist/sweetalert2.min.js"></script>


    <script type="text/javascript" src="public/js/jquery.easing.min.js"></script>

    <script type="text/javascript" src="public/js/sb-admin-2.min.js"></script>

    <script type="text/javascript" src="public/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="public/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="public/js/script_datatable.js"></script>

    <script type="text/javascript" src="public/js/others/holder.min.js"></script>


    <script type="text/javascript" src="public/js/bootstrap/bootstrap.min.js"></script>

    <!-- <script type="text/javascript">
        function horloge() {
            var div = document.getElementById("horloge");
            var heure = new Date();
            div.innerHTML = heure.getHours() + ":" + heure.getMinutes() + ":" + heure.getSeconds();
            window.setTimeout("horloge()", 1000);
        }
        horloge();
    </script> -->

    

    <!-- <script src="public/assets/js/fullcalendar.min.js"></script>
    <script src="public/assets/js/jquery.fullcalendar.js"></script>
    <script src="public/assets/js/bootstrap-datetimepicker.min.js"></script> -->

    <!-- <script src="public/frame_work/sweetalert2/sweetalert2.js" crossorigin="anonymous"></script>
    <script src="public/bootstrapselect/js/bootstrap-select.min.js"></script>

    <script src="public/frame_work/jquery2/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="public/frame_work/jquery2/jquery-ui-1.12.1/autocompletion/autocomple.js"></script> -->


<?php include 'views/others/errors.php' ?>





</body>

</html>