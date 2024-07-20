<?php 


class Database {


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


        $statment = $this->pdo->prepare($statment);
        $statment->execute($param);
        return $statment ; 
    }

   
}
