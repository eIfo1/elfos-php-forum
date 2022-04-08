<?php

// create categories class

class Categories
{
  // create a function to get all categories
  // ! This function is wrong. Fix it later.
  public function GetAllCategories($connection)
  {
    $sql = "SELECT * FROM categories";
    $result = $connection->query($sql);
    $categories = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
      }
    }
    return $categories;
  }
  public function GetCategory($connection, $id)
  {
    $sql = "SELECT * FROM categories WHERE category_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $category = array();
    if ($row = mysqli_fetch_assoc($result)) {
      $category = $row;
    }
    return $category;
  }
  public function DeleteCategory($connection, $id)
  {
    $sql = "DELETE FROM categories WHERE category_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    header("location: ../categories.php");
    exit();
  }
  public function DeletePostsFromCategory($connection, $id)
  {
    $sql = "DELETE FROM posts WHERE category_id = ?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    header("location: ../categories.php");
    exit();
  }

  public function AddCategory($connection, $name, $description)
  {
    $sql = "INSERT INTO categories (category_name, category_description) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../?error=databasefailure");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $description);
    mysqli_stmt_execute($stmt);
    header("location: ../categories.php");
    exit();
  }
}
