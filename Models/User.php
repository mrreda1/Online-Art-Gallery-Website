<?php
require_once "../Database/database.php";

abstract class User {
  protected int $id;
  protected string $username;
  protected string $email;
  protected string $password;
  protected static $table = 'User';

  public function __constructor($id, $username, $email, $password) {
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
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
  public function getId(): int
  {
    return $this->id;
  }
}
