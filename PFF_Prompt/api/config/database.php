<?php
class Database {
  private $host = "localhost";
  private $db_name = "alten";
  private $username = "root";
  private $password = "";
  public $conn;

  // get the database connection
  public function getConnection() {
    // Create connection
    try{
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->conn->exec("set names utf8");
    }catch(PDOException $exception){
      echo "Connection error: " . $exception->getMessage();
    }
    return $this->conn;
  }
