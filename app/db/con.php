<?php

define("HOST", "localhost");
define("DB", "sisuneb");
define("USER", "root");
define("PASS", "k299");

static $conn; 

function getConnection() {
    try {
        if (!isset($conn)) {
            $conn = new PDO('mysql:host=localhost;dbname=sisuneb', 'root', 'k299', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return $conn;
    } catch (Exception $erro) {
        $erro->getMessage() . " Mensagem " . $erro->getTraceAsString();
    }
}

