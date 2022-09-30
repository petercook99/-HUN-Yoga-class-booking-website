<?php

class UjOktContr extends UjOktato{

   private $vnev;
   private $knev;
   private $email;
   private $jelszo;
   private $tapasztalat;
   private $leiras;

   public function __construct($vnev, $knev, $email, $jelszo, $tapasztalat, $leiras){
      $this->vnev=$vnev;
      $this->knev=$knev;
      $this->email=$email;
      $this->jelszo=$jelszo;
      $this->tapasztalat=$tapasztalat;
      $this->leiras=$leiras;
   }

   public function oktato(){
      $this->setOktato($this->vnev, $this->knev, $this->email, $this->jelszo, $this->tapasztalat, $this->leiras);
   }
}

 ?>
