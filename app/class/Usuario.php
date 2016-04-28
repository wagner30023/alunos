<?php

/**
 * Description of Usuario
 *
 * @author carlos
 */
class Usuario {

    private $nome;
    private $datanasc;
    private $email;
    private $senha;
    private $id;

    /*
      function __clone($nome,$datanasc,$email,$senha) {
      $this->nome = $nome;
      $this->datanasc = $datanasc;
      $this->email = $email;
      $this->senha = $senha;
      } */

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getDatanasc() {
        return $this->datanasc;
    }

    function setDatanasc($datanasc) {
        $this->datanasc = $datanasc;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

}
