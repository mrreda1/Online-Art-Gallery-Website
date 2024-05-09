<?php
class Database {
  private $host = 'localhost';
  private $db_name = 'gallery';
  private $username = 'root';
  private $password = 'Stone';
  private $conn;

  // Singleton design pattern
  private static $db = null;
  private function __construct() {}
  public static function getInstance() {
    if (self::$db === null) {
      self::$db = new self();
    }
    return self::$db;
  }

  // DB Connect
  public function connect()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO(
        'mysql:host=' . $this->host . ' ;dbname=' . $this->db_name,
        $this->username,
        $this->password
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
    }
    return $this->conn;
  }
}
