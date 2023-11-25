<?php

namespace app\models;

use app\core;
use app\core\Model;

//use app\models\HomeModel;


class HomeModel extends Model

{

  public function get_data()
  {
    return array(
      array(
        'test1' => self::dbconn(),
        'test2' => self::createTableUsers()
        //'test3' => self::create_data()

      ),
      self::create_data(),
      //   array(
      //     'Year' => '2012',
      //     'Site' => 'http://DunkelBeer.ru',
      //     'Description' => 'Промо-сайт темного пива Dunkel от немецкого производителя Löwenbraü выпускаемого в России пивоваренной компанией "CАН ИнБев".'
      //   ),
    );
  }
}
//}
