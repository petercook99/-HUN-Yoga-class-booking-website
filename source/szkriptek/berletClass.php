<?php

class BerletContr extends Berlet{

   private $email;
   private $oktato;
   private $alkalmak;

   public function __construct($email, $oktato, $alkalmak){
      $this->email=$email;
      $this->oktato=$oktato;
      $this->alkalmak=$alkalmak;
   }

   public function berlet(){
      if($this->berletExists($this->email, $this->oktato)){
         header("location: ../berlet.php?hiba=berletmarletezik");
         exit();
      }

      $this->setBerlet($this->email, $this->oktato, $this->alkalmak);
   }
}

 ?>
