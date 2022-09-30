<?php

class TipusContr extends Tipus{

   private $id;

   public function __construct($id){
      $this->id=$id;
   }

   public function oratipus(){
      $this->getTipus($this->id);
   }
}

 ?>
