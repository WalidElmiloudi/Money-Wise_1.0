<?php

namespace App\Model;

use App\Core\Database;

class User{
  private int $id;
  private string $name;
  private string $email;

  
  function __construct(int $id, string $name, string $email){
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
  }

  public function getName(){
    return $this->name;
  }

  public function getId(){
    return $this->id;
  }

  public function getEmail(){
    return $this->email;
  }

}

?>