<?php
//try {
// $dbuser = 'admin';
// $dbpass = 'root';
// $host = 'db';
// $dbname = 'postgres';
// $dbh = new PDO("pgsql:host=localhost;dbname=$dbname", $dbuser, $dbpass);
// } catch (PDOException $e) {
//   echo "Error!: " . $e->getMessage() . "<br/>";
//   die();
// }

//   $dbuser = 'admin';
//   $dbpass = 'root';
//   $host = 'db';
//   $dbname = 'postgres';
//   $dbh = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
// } catch (PDOException $e) {
//   echo "Error : " . $e->getMessage() . "<br/>";
//   die();
// }


// $sql = 'CREATE TABLE IF NOT EXISTS Url (
//   id serial PRIMARY KEY,
//   longURL varchar(255) NOT NULL,
//   shortURL varchar(100) NOT NULL
// )';

// $dbh->exec($sql);


namespace app\PostgreSQLTutorial;

use PDO;

class Db
{
  /**
   * Connection
   * тип @var
   */
  private static ?Db $conn = null;

  /**
   * Подключение к базе данных и возврат экземпляра объекта \PDO
   * @return \PDO
   * @throws \Exception
   */
  public function connect()
  {
    // чтение параметров в файле конфигурации ini
    $params = parse_ini_file('database.ini');
    if ($params === false) {
      throw new \Exception("Error reading database configuration file");
    }

    $dbuser = 'admin';
    $dbpass = 'root';
    $host = 'db';
    $dbname = 'postgres';
    $dbh = new PDO("pgsql:host=localhost;dbname=$dbname", $dbuser, $dbpass);

    return $dbh;
  }

  /**
   * возврат экземпляра объекта Connection
   * тип @return
   */
  public static function get()
  {
    if (null === static::$conn) {
      static::$conn = new self();
    }

    return static::$conn;
  }

  protected function __construct()
  {
  }
}
