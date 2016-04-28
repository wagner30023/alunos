<?php

/**
 * Classe para gerenciar a conexão com o banco de dados
 */
class Database {

    // Dados do BD
    private static $db = 'sisuneb';
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = 'k299';
    // Instancia Singleton
    private static $con = null;

    public function __construct() {
        die('Criação não permitida');
    }

    // Conecta com o sigleton
    public static function connect() {

        if (self::$con == null) {

            try {
                self::$con = new mysqli(self::$host, self::$user, self::$password, self::$db);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        return self::$con;
    }

    // Desconecta o sigleton
    public static function disconnect() {
        self::$con = null;
    }

}

?>