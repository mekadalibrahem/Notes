<?php 
namespace App;

/**
 * Provide some method for call SESSION object like put , get and destroy ...
 */
class Session {

    public  const FLUSH_KEY = "__flush";

    /**
     * get value by  key 
     * first search for key in under super key __flush if not found search in key 
     * @param mixed $key key will seacrh for it in session
     * @param mixed $default (optional) default value will return if key not found , if not set value will return null 
     * @return mixed value for key if found it , owtherise return default value 
     */
    public static function get($key , $default = null) {
        Session::start();
        return $_SESSION[static::FLUSH_KEY][$key] ?? $_SESSION[$key] ?? $default;
    }


    /**
     * save new value or update value (if session not created befor then will create new session)
     * @param mixed $key key for value which will saved
     * @param mixed $value value which will saved
     * @return void
     */
    public static function put($key , $value) {
        Session::start();
        $_SESSION[$key] = $value;
    }

    /**
     * delete value from session by key
     * @param mixed $key key for value which will deleted
     * @return void
     */
    public static function delete($key) {
        Session::start();
        unset($_SESSION[$key]);
    }
    /**
     * delete session file
     * @return void
     */
    public static function destroy(){
        Session::start();
        session_destroy();
    }

    /**
     * start session if session not started befor ( if session started befor do nothing)
     * @return void
     */
    public static function start(){
       if(session_status() !== PHP_SESSION_ACTIVE){ 
            session_start();
        }
    }
    /**
     * check if session have data by key
     * @param mixed $key which will search about it
     * @return bool true if exists , otherwise return false 
     */
    public static function has($key){
        Session::start();
       
        return isset($_SESSION[$key]);
    }

    public static function flush($key , $value){
        Session::start();
        $_SESSION[static::FLUSH_KEY][$key] = $value;

    }

    public static  function unflsh(){
        $_SESSION[static::FLUSH_KEY] = [];
    }
    
}
