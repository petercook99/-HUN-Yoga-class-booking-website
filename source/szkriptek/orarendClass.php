<?php

class orarendContr extends Orarend{

   private $heteleje;
   private $hetvege;

   public function __construct($heteleje, $hetvege){
     $this->heteleje=$heteleje;
     $this->hetvege=$hetvege;
   }

   public function orarend(){
      $this->getOrak($this->heteleje, $this->hetvege);
   }
}

 ?>
