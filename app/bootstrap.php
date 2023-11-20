<?php

namespace app;


session_start();

require_once 'config' . DIRECTORY_SEPARATOR . 'config.php';

require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php'; //подключаем сам сборщик

core\Route::start();

//require_once './models/db.php';

PostgreSQLTutorial\Db::get();


var_dump($dbh);
if (!$dbh) {
  echo 'Having connection problems, contact the administrator';
} else {
  echo 'колбаса';
  $sql = 'CREATE TABLE IF NOT EXISTS login (
    id serial PRIMARY KEY,
    login varchar(255) NOT NULL,
    passward varchar(100) NOT NULL
  )';

  $dbh->exec($sql);
}
