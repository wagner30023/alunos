<?php

define("HOST", "localhost");
define("DB", "sisuneb");
define("USER", "root");
define("PASS", "k299");

class Database {

    private static $conn;

   
    public static function getConnection() {
        try {
            if (!isset(self::$conn)) {
                self::$conn = new PDO('mysql:host=localhost;dbname=sisuneb', 'root', 'k299', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            }
            return self::$conn;
        } catch (Exception $erro) {
            $erro->getMessage() . " Mensagem " . $erro->getTraceAsString();
        }
    }

    // Desconecta o sigleton
    public static function disconnect() {
        self::$conn = null;
    }

}
