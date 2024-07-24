<?php 
namespace App;

/**
 * Provide some method for call SESSION object like put , get and destroy ...
 */
class Session {


    /**
     * get value by  key
     * @param mixed $key key will seacrh for it in session
     * @return mixed value for key if found it , owtherise return null
     */
    public static function get($key) {
        return $_SESSION[$key] ?? null;
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
        unset($_SESSION[$key]);
    }
    /**
     * delete session file
     * @return void
     */
    public static function destroy(){
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
        return isset($_SESSION[$key]);
    }
    
}
