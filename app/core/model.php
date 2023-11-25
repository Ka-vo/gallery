<?php

namespace app\core;

use app\models\Db;
use PDO;

class Model
{
  public static function dbconn()
  {
    $dbh = Db::get();
    return $dbh;
  }

  public function get_data()
  {
  }
  public static function createTableUsers()
  {
    $dbh = self::dbconn();
    if ($dbh) {
      $sql = 'CREATE TABLE IF NOT EXISTS users (
        id serial PRIMARY KEY,
        login varchar(255) NOT NULL,
        email varchar(100) NOT NULL,
        passward varchar(100) NOT NULL
  )';
      return $dbh->exec($sql);
    } else {
      return 'Having connection problems, contact the administrator';
    }
  }

  public static function create_data()
  {
    $dbh = self::dbconn();
    $LOGIN = $_POST['login'];
    $EMAIL = $_POST['email'];
    $PASSWARD = $_POST['password'];
    $CONFIRMPASS  = $_POST['password_confirm'];
    $hash = password_hash($PASSWARD, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO users(login, email, passward) VALUES(:login, :email, :password)';
    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':login',  $LOGIN);
    $stmt->bindValue(':email', $EMAIL);
    $stmt->bindValue(':password', $hash);

    $res = $dbh->query("SELECT login FROM users WHERE login = '$LOGIN'");

    $result = $res->FetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
    if (empty($result) && $CONFIRMPASS == $PASSWARD) {
      $stmt->execute();
    }
    // else {
    //   echo 'Пользователь с таким иминем уже существует';
    // }
    return  $result;
  }
}
