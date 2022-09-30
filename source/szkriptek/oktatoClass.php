<?php

class OktatoContr extends Oktato{

   private $id;

   public function __construct($id){
      $this->id=$id;
   }

   public function oktato(){
      $this->getOktatok($this->id);
   }
}

 ?>
