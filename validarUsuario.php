<?php

require_once './app/class/UsuarioDAO.php';

$user = null;

$email = filter_input(INPUT_POST, 'userName');
$senha = filter_input(INPUT_POST, 'userPassword');

echo $email;exit(); 

$user = UsuarioDAO::fetchUsuarioValido($email,$senha);

if ($user) :
    session_start();
    $_SESSION[$email] = $user[0][$email];
    $_SESSION[$senha] = $user[0][$senha];
    header("Location: home.php?active=home");
else:
    header("Location: index.php?active=index");
endif;