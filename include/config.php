<?php
include('functions.php');
date_default_timezone_set('America/New_York');

require('classes/Site.php');

$db_name = "forum";
$db_host = "localhost";
$db_username = "root";
$db_password = "DatabasePass";

// start site connection
$Site = new Site($db_name, $db_username, $db_host, $db_password);
$conn = $Site->connect();

require('classes/Auth/User.php');

if (!isset($User)) {
    if (!isset($_SESSION['UserID'])) {
        $User = new User(null, null, null, null, null, false);
    } else {
        $UserID = $_SESSION['UserID'];
        $sql = "SELECT * FROM users WHERE user_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup/?error=databasefailure");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $UserID);
        mysqli_stmt_execute($stmt);

        $Data = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($Data)) {
            $User = new User($row['user_id'], $row['user_name'], $row['user_email'], $row['user_created'], $row['post_count'], true);
        } else {
            header("location: ../signup/?error=databasefailure");
            exit();
        }
    }
}
