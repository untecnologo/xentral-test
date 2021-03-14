<?php

class validations{

    public function email_validation($email){

       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           return false;
       } else{
           return true;
       }       
       
    }
}

?>