<?php 

namespace App ;
use PDO ;

class Database {


    public $statment ; 
    protected $pdo ;
    /**
     * Summary of __construct
     * @param mixed $config database configration 
     */
    public function  __construct($config)
    {   
        
        try {
            $username = $config['username'];
            $password = $config['password']; 
            $dsn =  $config['driver'] .":" . http_build_query($config['dsn'] , '' , ';');
        $this->pdo = new PDO($dsn, $username , $password);
        } catch (\Throwable $th) {
            dd($th);
        }
       
    }

    /**
     * method call spific qeury for database 
     * @param $statment  query statmet which will exicute in databse 
     * @param $param query parameters 
     * @return  $data from database query
     */
    public function query($statment , $param = [])
    {


        $this->statment = $this->pdo->prepare($statment);
        $this->statment->execute($param);
       return $this ;
    }


    /**
     * fetch qeuery result
     * @return mixed
     */
    public function find(){
        return $this->statment->fetch();
    }

    /**
     * return result for query and if query not return result (Null) fail and abort with error 404 
     * @return mixed
     */
    public function findOrFail(){
        $result = $this->find();
        if(!$result){
            Route::abort();
        }
        
        return $result ;
    }


    /**
     * 
     * get all result as array of data
     * @return array
     */
    public function get(){
        return $this->statment->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *  return result as array or fail with abort(404) Not Found 
     * @return array
     */
    public function getOrFail(){
        $result = $this->get();
        if(!$result) {Route::abort();}
        return $result ;
    }
   
}
