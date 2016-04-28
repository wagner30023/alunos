<?php

/**
 * Description of UsuarioDAO
 *
 * @author carlos
 */
require_once './app/db/Conexao.php';

class UsuarioDAO extends Database {

    public static function Insert(Usuario $objInsert) {
        try {
            $dao = parent::getConnection();
            $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sql = "INSERT INTO usuario(nome,datanasc,email,senha) VALUES(:nome,:datanasc,:email,:senha)";
            $stmt = $dao->prepare($sql);
            $stmt->bindValue(":nome", $objInsert->getNome());
            $stmt->bindValue(":datanasc", $objInsert->getDatanasc());
            $stmt->bindValue(":email", $objInsert->getEmail());
            $stmt->bindValue(":senha", $objInsert->getSenha());
            $stmt->execute();
        } catch (Exception $erro) {
            $erro->getMessage() . "" . $erro->getTraceAsString();
        }
    }

    public static function Select() {
        try {
            $dao = parent::getConnection();
            $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sql = "SELECT * FROM usuario";
            $stmt = $dao->query($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dao = null;
        } catch (Exception $erro) {
            $erro->getMessage() . "" . $erro->getTraceAsString();
        }
    }

    // criar uma função de busca() individual

    public static function Search(Usuario $objBusca = null) {
        try {
            $dao = parent::getConnection();
            $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sql = "SELECT * FROM usuario WHERE nome LIKE :nome ";
            $stmt = $dao->prepare($sql);
            $stmt->bindValue("nome", $objBusca->getNome() . "%");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

            $dao = null;
        } catch (Exception $erro) {
            $erro->getMessage() . "" . $erro->getTraceAsString();
        }
    }

    public static function Update(Usuario $edit) {
        $dao = parent::getConnection();
        $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sql = "UPDATE usuario SET nome=?,datanasc=?,email=?,senha=? WHERE id=?";
        $stmt = $dao->prepare($sql);
        $stmt->bindParam(1, $edit->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(2, $edit->getDatanasc(), PDO::PARAM_INT);
        $stmt->bindParam(3, $edit->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(4, $edit->getSenha(), PDO::PARAM_STR);
        $stmt->execute();
        $dao = null;
    }

    public static function fetchUsuarioValido($email,$senha) {
        try {

            $dao = parent::getConnection();
            //$dao->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
            $stmt = $dao->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            return $stmt->fetchAll();
            $dao = null;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

}
