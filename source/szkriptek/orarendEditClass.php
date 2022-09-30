<?php

class OrarendEditContr extends OrarendEdit{

   private $foglalasID;
   private $kezdes;
   private $veg;
   private $helyettes;

   public function __construct($foglalasID, $kezdes, $veg, $helyettes){
      $this->foglalasID=$foglalasID;
      $this->kezdes=$kezdes;
      $this->veg=$veg;
      $this->helyettes=$helyettes;
   }

   public function orarendEdit(){
      $this->setEdit($this->foglalasID, $this->kezdes, $this->veg, $this->helyettes);
   }
}

class OrarendNewContr extends OrarendNewClass{

  private $kezdes;
  private $veg;
  private $oktato;
  private $ora;
  private $korlat;

   public function __construct($kezdes, $veg, $oktato, $ora, $korlat){
      $this->kezdes=$kezdes;
      $this->veg=$veg;
      $this->oktato=$oktato;
      $this->ora=$ora;
      $this->korlat=$korlat;
   }

   public function orarendNewClass(){
      $this->setNewClass($this->kezdes, $this->veg, $this->oktato, $this->ora, $this->korlat);
   }
}

 ?>
