<?php

class MenuContr extends Menu{
   private $menu;

   public function __construct($menu){
      $this->menu=$menu;
   }

   public function menu(){
      if($this->menu=="menu"){
         $this->getOktatok();
         $this->getTipusok();
      }
      elseif($this->menu=="emailek") $this->getUgyfelek();
      header("location: ../index.php");
      exit();
   }
}

 ?>
