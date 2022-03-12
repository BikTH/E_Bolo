<?php

$db = mysqli_connect("localhost", "root", "", "stage_mark1");

// Check connection
if (!$db) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}