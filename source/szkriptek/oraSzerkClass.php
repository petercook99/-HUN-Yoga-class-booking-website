<?php

class OraSzerkContr extends oraSzerk{
   private $id;
   private $leiras;

   public function __construct($id, $leiras){
      $this->id=$id;
      $this->leiras=$leiras;
   }

   public function oraSzerkesztes(){
      $this->oraSzerkeszt($this->id, $this->leiras);
   }
}

?>