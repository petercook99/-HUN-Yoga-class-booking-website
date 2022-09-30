<?php

class profilOktContr extends ProfilOkt{
   private $id;

   public function __construct($id){
      $this->id=$id;
   }

   public function profilOkt(){
      $this->getBerlet($this->id);
      $this->getFoglalas($this->id);
      $this->getOrak($this->id);
      $this->getOkt($this->id);
   }
}

 ?>
