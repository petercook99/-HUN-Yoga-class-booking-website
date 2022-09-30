<?php

class LoginContr extends Login{
   private $email;
   private $pw;

   public function __construct($email, $pw){
      $this->email=$email;
      $this->pw=$pw;
   }

   public function login(){
      if($this->emptyInputs() ){
         header("location: ../index.php?hiba=uresmezok");
         exit();
      }

      if(!$this->getUser($this->email, $this->pw)){
         $this->getOktato($this->email, $this->pw);
      }
   }

   private function emptyInputs(){
      if(empty($this->email) || empty($this->pw)) {
         return true;
      }
      else return false;
   }
}

 ?>
