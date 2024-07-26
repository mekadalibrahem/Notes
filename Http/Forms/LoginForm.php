<?php 

namespace Http\Forms;
use App\Container;
use App\Database;
use App\Validator;

class LoginForm {
    protected $errors = [] ;

    public function validate($email , $password) {
        $this->errors = [] ;
        $user  = false ;
        $db = Container::resolve(Database::class);

        if(!Validator::string($password, 5,50)) {
            $this->errors['password'] = 'password is required and should be 5-50 charachters';
        }
        if(!Validator::email($email)) {
            $this->errors["email"] = 'Invalid email address';
        }else{
            $user =    $db->query("SELECT * FROM users WHERE email = :email",["email" =>$email])->find();

            if(!$user){
                $this->errors["email"] = "Wrong email dosn't esists";
            }
        }
       
       
       
    
        
        
        return empty($this->errors) ;
    }

    public function errors(){
        return $this->errors ;
    }
    public function addError($key , $value){
        $this->errors[$key] = $value ;
    }

}
