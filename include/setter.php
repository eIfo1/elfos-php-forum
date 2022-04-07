<?php

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
        $User = new User($row['id'], $row['username'], $row['email'], $row['date_created'], $row['post_number']);
    } else {
        $User = new User(null, null, null, null, null);
    }
}
