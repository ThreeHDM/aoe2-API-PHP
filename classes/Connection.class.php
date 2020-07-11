<?php

class Connection 
{
    //Propiedades
    public $query;
    public $user;
    public $pass;

    //Constructor
    public function __construct($query, $user, $pass) {
        $this->query = $query;
        $this->user = $user;
        $this->pass = $pass;
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

