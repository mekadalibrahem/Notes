<?php 
namespace App ;
/**
 * simple validator for check user input data
 */
class Validator {

    /**
     * validate string value (not empty or more then max) 
     * @param mixed $value value which will validate 
     * @param mixed $min min char valid
     * @param mixed $max max char valid
     * @return bool true if value more or equal  min or less or equal max , otherwise false
     */
    public  static function string($value , $min = 1, $max = INF){
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    /**
     * validat value is email or not
     * @param mixed $value value which will validate
     * @return mixed true it is valid email , otherwise  false
     */
    public static function email($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }


    /**
     * check if tow values is equal or not
     * @param mixed $value1 
     * @param mixed $value2
     * @return bool  true if they equal , otherwise false
     */
    public static function equal($value1 , $value2 , ){    
        return $value1 === $value2;
      }
}
