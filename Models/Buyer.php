<?php
require_once "User.php";

class Buyer extends User {
  private static $role = 0;
  public function __constructor() {
  }
  public static function read() {
    $db = Database::getInstance();
    $conn = $db->connect();
    $query = 'SELECT
    b.id,
    b.username,
    b.email,
    b.passwd
    FROM ' . self::$table . ' as b WHERE role = ' . self::$role;
    // Prepare
    $stmt = $conn->prepare($query);

    // Execute
    $stmt->execute();
    return $stmt;
  }
  public function getUserName(): string {
    return $this->username;
  }
  public function setUserName($username) {
    $this->username = $username;
  }
  public function getEmail(): string {
    return $this->email;
  }
  public function getId(): int {
    return $this->id;
  }
}
