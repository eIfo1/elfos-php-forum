<?php

class Post
{
    // Get all posts from category
    public function GetAllPosts($connection, $category_id)
    {
        $sql = "SELECT * FROM posts WHERE category_id = ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../?error=databasefailure");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $category_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }
    // Get post by id
    public function GetPost($connection, $id)
    {
        $sql = "SELECT * FROM posts WHERE post_id = ?";
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
    public function DeletePost($connection, $id)
    {
        $sql = "DELETE FROM posts WHERE post_id = ?";
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

    public function AddPost($connection, $title, $content, $category_id, $user_id)
    {
        $sql = "INSERT INTO posts (post_body, post_category, post_name, post_creator) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../?error=databasefailure");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssss", $content, $category_id, $title, $user_id);
        mysqli_stmt_execute($stmt);
        header("location: ../");
        exit();
    }
    // create function that only edits post_title
    public function EditPostTitle($connection, $post_title, $post_id)
    {
        $sql = "UPDATE posts SET post_name = ? WHERE post_id = ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../?error=databasefailure");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $post_title, $post_id);
        mysqli_stmt_execute($stmt);
        header("location: ../");
        exit();
    }
    // create function that only edits post_content
    public function EditPostContent($connection, $post_content, $post_id)
    {
        $sql = "UPDATE posts SET post_body = ? WHERE post_id = ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../?error=databasefailure");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $post_content, $post_id);
        mysqli_stmt_execute($stmt);
        header("location: ../");
        exit();
    }
    // Scrub Post title
    public function ScrubPostTitle($connection, $id)
    {
        $sql = "UPDATE posts SET post_name = ? WHERE post_id = ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../?error=databasefailure");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", "[ Content Deleted ]", $id);
    }
    // Scrub Post content
    public function ScrubPostContent($connection, $id)
    {
        $sql = "UPDATE posts SET post_body = ? WHERE post_id = ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../?error=databasefailure");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", "This post has been removed for violating the terms of service.", $id);
    }
    // Delete all replies from post
    public function DeleteReplies($connection, $id)
    {
        $sql = "DELETE FROM replies WHERE reply_post_id = ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../?error=databasefailure");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
    }
}
