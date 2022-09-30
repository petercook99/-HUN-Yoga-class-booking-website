<?php

class RegContr extends Register{
   private $email;
   private $pw;
   private $pwrepeat;
   private $lname;
   private $fname;
   private $phone;

   public function __construct($email, $pw, $pwrepeat, $lname, $fname, $phone){
      $this->email=$email;
      $this->pw=$pw;
      $this->pwrepeat=$pwrepeat;
      $this->lname=$lname;
      $this->fname=$fname;
      $this->phone=$phone;
   }

   public function register(){
      if($this->emptyInputs() ){
         header("location: ../index.php?hiba=uresmezok");
         exit();
      }
      if($this->invalidEmail() ){
         header("location: ../index.php?hiba=rosszemail");
         exit();
      }
      if(!$this->passwordMatch() ){
         header("location: ../index.php?hiba=rosszjelszo");
         exit();
      }
      if($this->emailExist() ){
         header("location: ../index.php?hiba=emailmarletezik");
         exit();
      }

      $this->setUser($this->email, $this->pw, $this->lname, $this->fname, $this->phone);
   }

   private function emptyInputs(){
      if(empty($this->email) || empty($this->pw) || empty($this->pwrepeat) || empty($this->lname) || empty($this->fname) || empty($this->phone)) {
         return true;
      }
      else return false;
   }

   private function invalidEmail(){
      $result;
      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) return true;
      else return false;
   }

   private function passwordMatch(){
      if($this->pw === $this->pwrepeat) return true;
      else return false;
   }

   private function emailExist(){
      if($this->emailExists($this->email)) return true;
      else return false;
   }
}

 ?>
