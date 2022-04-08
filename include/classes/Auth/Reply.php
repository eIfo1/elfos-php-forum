<?php

class Reply
{
  // get reply to post
  public function GetReply($connection, $post_id)
  {
    $sql = "SELECT * FROM replies WHERE post_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
  }
  // get reply by id
  public function GetReplyById($connection, $id)
  {
    $sql = "SELECT * FROM replies WHERE reply_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
  }
  // delete reply
  public function DeleteReply($connection, $id)
  {
    $sql = "DELETE FROM replies WHERE reply_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    header("location: ../");
    exit();
  }
  // add reply
  public function AddReply($connection, $content, $post_id, $user_id)
  {
    $sql = "INSERT INTO replies (reply_body, reply_post_id, reply_creator) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $content, $post_id, $user_id);
    mysqli_stmt_execute($stmt);
    header("location: ../");
    exit();
  }
  // edit reply
  public function EditReply($connection, $content, $id)
  {
    $sql = "UPDATE replies SET reply_body = ? WHERE reply_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $content, $id);
    mysqli_stmt_execute($stmt);
    header("location: ../");
    exit();
  }
  // scrub reply
  public function ScrubReply($connection, $id)
  {
    $sql = "UPDATE replies SET reply_body = ? WHERE reply_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", "This reply has been removed for violating the terms of service.", $id);
    mysqli_stmt_execute($stmt);
    header("location: ../");
    exit();
  }
}
