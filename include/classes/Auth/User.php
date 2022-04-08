<?php

class User
{
  private $id;
  public $username;
  public $email;
  public $date_created;
  public $post_count;
  public $is_admin;
  public $auth;

  // Methods
  public function __construct($id, $username, $email, $date_created, $post_number, $auth)
  {
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
    $this->date_created = $date_created;
    $this->post_count = $post_number;
    $this->auth = $auth;
  }

  // update password
  public function UpdatePassword($connection, $password)
  {
    // hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // update password
    $sql = "UPDATE users SET user_password = ? WHERE user_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $this->id);
    mysqli_stmt_execute($stmt);
    header("location: ../");
    exit();
  }

  public function UpdateUsername($connection, $username)
  {
    if ($this->username = $username) {
      return;
    } else {
      $sql = "UPDATE users SET user_name = ? WHERE user_id = ?;";
      $stmt = mysqli_stmt_init($connection);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup/?error=databasefailure");
        exit();
      }

      mysqli_stmt_bind_param($stmt, "si", $username, $this->id);
      mysqli_stmt_execute($stmt);
    }
  }

  public function IncrementPostCount($connection)
  {
    $this->post_count++;
    $sql = "UPDATE users SET post_number = ? WHERE id = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $this->post_number, $this->id);
    mysqli_stmt_execute($stmt);
  }

  public function UpdateEmail($connection, $email)
  {
    if ($this->email == $email) {
      return;
    } else {
      $this->email = $email;
      $sql = "UPDATE users SET user_email = ? WHERE user_id = ?;";
      $stmt = mysqli_stmt_init($connection);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../?error=databasefailure");
        exit();
      }
      mysqli_stmt_bind_param($stmt, "ss", $this->email, $this->id);
      mysqli_stmt_execute($stmt);
    }
  }
  // Address Issue #2

}
