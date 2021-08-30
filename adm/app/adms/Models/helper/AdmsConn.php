<?php

/* @author jessica */

namespace App\adms\Models\helper;

use PDO;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsConn {

    public static $host = HOST;
    public static $user = USER;
    public static $pass = PASS;
    public static $dbName = DBNAME;
    private static $connect = null;

    private static function conectar() {
        try {
            if(self::$connect == null){
                self::$connect = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbName, self::$user, self::$pass);
            }
            
        } catch (Exception $exc) {
            echo 'Mensagem: ' . $exc->getMessage();
            die;
        }
        return self::$connect;
    }
    
    public function getConn() {
        return self::conectar();
    }

}
