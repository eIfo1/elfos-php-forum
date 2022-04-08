<?php

class Site
{
  private $db_name;
  private $db_username;
  private $db_host;
  private $db_password;

  // create construct
  public function __construct($db_name, $db_username, $db_host, $db_password)
  {
    $this->db_name = $db_name;
    $this->db_username = $db_username;
    $this->db_host = $db_host;
    $this->db_password = $db_password;
  }

  // create a function to connect to the database
  public function connect()
  {
    // create a connection to the database
    $connection = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
    // check if the connection is successful
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    // return the connection
    return $connection;
  }
}
