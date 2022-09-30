<?php

class OktatoSzerkContr extends oktatoSzerk{
   private $id;
   private $tapasztalat;
   private $leiras;

   public function __construct($id, $tapasztalat, $leiras){
      $this->id=$id;
      $this->tapasztalat=$tapasztalat;
      $this->leiras=$leiras;
   }

   public function oktatoSzerkesztes(){
      $this->oktatoSzerkeszt($this->id, $this->tapasztalat, $this->leiras);
   }
}

?>