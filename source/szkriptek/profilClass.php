<?php

class profilContr extends Profil{
   private $email;
   private $profil;

   public function __construct($email, $profil){
      $this->email=$email;
      $this->profil=$profil;
   }

   public function profil(){
      $this->getBerlet($this->email, $this->profil);
      $this->getFoglalas($this->email, $this->profil);
   }
}

 ?>
