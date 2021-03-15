<?php

class validations{

    public function emailValidation($email){

       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           return false;
       } else{
           return true;
       }       
       
    }
}

?>