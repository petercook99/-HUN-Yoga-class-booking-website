<?php

class FoglalasContr extends Foglalas{
   private $email;
   private $oktatoID;
   private $foglalasID;
   private $mod;
   private $alkalmak;

   public function __construct($email, $oktatoID, $foglalasID, $mod, $alkalmak){
      $this->email=$email;
      $this->oktatoID=$oktatoID;
      $this->foglalasID=$foglalasID;
      $this->mod=$mod;
      $this->alkalmak=$alkalmak;
   }

   public function foglalas(){
      $sikeresFoglalas=$this->setFoglalas($this->email, $this->foglalasID, $this->mod);
      $sikeresLevonas=true;
      if ($this->mod == "berlet") {
         $sikeresLevonas=$this->berletLevonas($this->email, $this->oktatoID, $this->alkalmak);
      }
      if($sikeresFoglalas && $sikeresLevonas) header("location: ../orarend.php?hiba=nincs");
      else header("location: ../orarend.php?hiba=adatbazis");
   }
}

 ?>
