<?php 

namespace Http\Forms;

use App\Validator;

class RegisterForm {
    protected $errors = [] ;

    public function validate($username , $email , $password , $confirm_password) {
        $this->errors = [] ;
        
       
        if(!Validator::string($username , 3,100)){
            $this->errors["username"] = "this value should be at last 3-100 characters";
        }
        
        if(!Validator::email($email)){
            $this->errors["email"] =  "this email invalid";
        }
        if(!Validator::string($password , 8 , 50)){
            $this->errors["password"] = "this value should be at last 8-50 characters";
        }
        
        if(!Validator::equal($password , $confirm_password)){
            $this->errors["confirm_password"] = "Password and confirmation don't matching";
        }
        
        if(Validator::exists($email, "users" , "email")){
            $this->errors["email"] =  "this email alrady exists";
        }
        if(Validator::exists($username , 'users' , 'username')) {
            $this->errors["username"] =  "this username alrady exists";
        }
       
       
    
        
        
        return empty($this->errors) ;
    }

    public function errors(){
        return $this->errors ;
    }

}
