<?php

class LemondasContr extends Lemondas{
   private $id;
   private $email;
   private $berlet;
   private $oktatoID;

   public function __construct($id, $email, $berlet, $oktatoID){
      $this->id=$id;
      $this->email=$email;
      $this->berlet=$berlet;
      $this->oktatoID=$oktatoID;
   }

   public function lemondas(){
      $this->torles($this->id, $this->email);
      if ($this->berlet == 1) $this->berletFrissites($this->email, $this->oktatoID);
   }
}

 ?>
