<?php
error_reporting(0);
try {
    $conn = mysqli_connect("localhost", "root", "", "iip_academy");
    // hostname, username, password, db_name
} catch (Exception $error) {
    die("Connection error");
}
