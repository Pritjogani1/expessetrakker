<?php

namespace Core;

class Database{

    public $connection;
    public $statement;
    public function __construct($config,$username='root',$password='')
    {

     
        $dsn = 'mysql:'. http_build_query($config,'',';');
        // echo $dsn;
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};user={$config['user']};";
        $this->connection = new \PDO($dsn,$username,$password,[
            \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC
        ]);
    }
    


    public function query($query,$params=[]){
    
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        // $notes= $statement;
        return $this;

    }

    public function find(){

        //$statement->fetch()
        return $this->statement->fetch();
    }
    public function findOrFail(){
        $result = $this->find();
        if(!$result){
            aboart(Response::NOT_FOUND);
        }
        return $result;
    }

    public function get(){
        return $this->statement->fetchAll();
    }
}