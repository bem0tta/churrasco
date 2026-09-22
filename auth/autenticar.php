<?php
    require_once '../config/conexao.php';

    if(!isset($_POST['email']) || !isset($_POST['senha'])){
        header('location: ../login.php');
    }

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    try{
        $res = $con->query($sql);
        if($res->num_rows == 0){
            throw new mysqli_sql_exception("Não achou");
        }
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('location: ../index.php');
    } catch (mysqli_sql_exception $e) {
        session_destroy();
        header('location: login.php?res=falha');
    }