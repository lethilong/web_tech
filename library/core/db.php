<?php

class database {

    public $con;
    public $result;

    public function __construct(){

     try{

        return $this->con = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
       

     } catch(PDOException $e){

        echo "Database connection Error: ". $e->getMessage();

     }

    }

    
    public function Query($qry, $params = []){
       if(empty($params)){

        $this->result = $this->con->prepare($qry);
        return $this->result->execute();

       } else {
           $this->result = $this->con->prepare($qry);
           return $this->result->execute($params);
       }

    }

    public function rowCount(){

        return $this->result->rowCount();

    }

    public function fetchall(){

        return $this->result->fetchAll(PDO::FETCH_OBJ);

    }

    public function fetch(){

        return $this->result->fetch(PDO::FETCH_OBJ);

    }



}


?>