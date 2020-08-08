<?php
namespace MyApp\Api;

use MyApp\Data\Connection;
use \PDO;

require __DIR__ . '/../../vendor/autoload.php';
//require __DIR__ . '/../classes/Connection.class.php';

class Civilizations
{
    //propiedades
        
    
    //Metodos estáticos
    static function getAll(){
    
        $conn = new Connection();
        $pdo = $conn->connection();
        $st = $pdo->prepare("SELECT * FROM `civilizations` WHERE 1");
        $st->execute();

        $units = array();
        
        while ($array = $st->fetch(PDO::FETCH_ASSOC)) {
            $civilizations[] = $array;
        }
    
        $json = json_encode($civilizations);
        
        return $json;

    }

    static function getById($id){

        $conn = new Connection();
        $pdo = $conn->connection();
        $st = $pdo->prepare("SELECT * FROM `civilizations` WHERE id = :id");
        $st->bindParam(':id', $id);
        $st->execute();

        $civilization = $st->fetch(PDO::FETCH_ASSOC);
        
        $json = json_encode($civilization);
        
        return $json;

    }
}
