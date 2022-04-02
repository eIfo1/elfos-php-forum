<?php
include('functions.php');
date_default_timezone_set('America/New_York');

require('Site.php');

$db_name = "forum";
$db_host = "localhost";
$db_username = "root";
$db_password = "DatabasePass";

// start site connection
$Site = new Site($db_name, $db_username, $db_host, $db_password);
$conn = $Site->connect();

require('User.php');

if (@$_SESSION['IsAuthenticated'] == "true") {
    $UserID = $_SESSION['UserID'];
    $sql = "SELECT * FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup/?error=databasefailure");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $UserID);
    mysqli_stmt_execute($stmt);

    $Data = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($Data)) {
        $User = new User($row['id'], $row['username'], $row['email'], $row['date_created'], $row['post_number'], true);
    } else {
        header("location: ../signup/?error=databasefailure");
        exit();
    }
} else {
    $User = new User(null, null, null, null, null, false);
}
