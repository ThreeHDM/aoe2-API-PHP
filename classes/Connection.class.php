<?php

class Connection 
{
    //Propiedades
    private $query;
    private $user; 
    private $pass; 


    //Constructor
    public function __construct() {
        $this->query = "mysql:host=".env("DB_HOST").";dbname=".env("DB_NAME").";charset=utf8";
        $this->user = env("DB_USERNAME");
        $this->pass = env("DB_PASSWORD");
    }

    //Metodos
    public function connection(){
        $pdo = new PDO($this->query,$this->user,$this->pass);
    
        /*
        if(env("ERROR_REPORTING")){
            //me devuelve si tengo error en la consulta sql.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        */
        return $pdo;
    }
}

