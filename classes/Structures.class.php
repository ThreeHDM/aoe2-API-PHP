<?php

require __DIR__ . '/../classes/Connection.class.php';

class Structures  
{
    //propiedades
        
    
    //Metodos estáticos
    static function getAll(){
    
        $conn = new Connection();
        $pdo = $conn->connection();
        $st = $pdo->prepare("SELECT * FROM `structures` WHERE 1");
        $st->execute();

        $structures = array();
        
        while ($array = $st->fetch(PDO::FETCH_ASSOC)) {
            $structures[] = $array;
        }
    
        $json = json_encode($structures);
        
        return $json;

    }

    static function getById($id){

        $conn = new Connection();
        $pdo = $conn->connection();
        $st = $pdo->prepare("SELECT * FROM `structures` WHERE id = :id");
        $st->bindParam(':id', $id);
        $st->execute();

        $structure = $st->fetch(PDO::FETCH_ASSOC);
        
        $json = json_encode($structure);
        
        return $json;

    }
}
