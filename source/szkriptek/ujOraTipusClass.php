<?php

class UjOraTipusContr extends UjOraTipus{

   private $nev;
   private $leiras;

   public function __construct($nev, $leiras){
      $this->nev=$nev;
      $this->leiras=$leiras;
   }

   public function oratipus(){
      $this->setOratipus($this->nev, $this->leiras);
   }
}

 ?>
