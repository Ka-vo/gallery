<?php

namespace app\vodels\entitites;

class User
{

  public string $username;
  public string $email;
  public string $role;
  public string $created;
  public function __construct($entity = null)
  {
    $this->username = $entity->username;
    $this->email = $entity->email;
    $this->created = \DateTime::createFromFormat('U', time());
    $this->role = 'user';
  }
}
