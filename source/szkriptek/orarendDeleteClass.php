<?php

class OrarendDelContr extends OrarendDel{
   private $foglID;

 public function __construct($foglID){
      $this->foglID=$foglID;
   }

   public function orarendDel(){
   $this->orarendDelete($this->foglID);
   }
}

?>
