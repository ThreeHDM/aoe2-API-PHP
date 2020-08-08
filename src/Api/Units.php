<?php
namespace MyApp\Api;

use MyApp\Data\Connection;
use \PDO;

require __DIR__ . '/../../vendor/autoload.php';
//require __DIR__ . '/../classes/Connection.class.php';

class Units
{
    //propiedades
        
    
    //Metodos estáticos
    static function getAll(){
    
        $conn = new Connection();
        $pdo = $conn->connection();
        $st = $pdo->prepare("SELECT * FROM `units` WHERE 1");
        $st->execute();

        $units = array();
        
        while ($array = $st->fetch(PDO::FETCH_ASSOC)) {
            $units[] = $array;
        }
    
        $json = json_encode($units);
        
        return $json;

    }

    static function getById($id){

        $conn = new Connection();
        $pdo = $conn->connection();
        $st = $pdo->prepare("SELECT * FROM `units` WHERE id = :id");
        $st->bindParam(':id', $id);
        $st->execute();

        $unit = $st->fetch(PDO::FETCH_ASSOC);
        
        $json = json_encode($unit);
        
        return $json;

    }
}
