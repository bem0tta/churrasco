<?php
    require_once 'conexao.php';

    if(!isset($_GET['email']) || !isset($_GET['senha'])){
        header('location: login.php');
    }

    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $sql = 'SELECT * FROM usuarios';
    $res = $con->query($sql);

    while($user = res->fetch_assoc()){
        if($user->email == $email && $user->senha == $senha){
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('location: index.php');
        } else{
            header('location: login.php?res=falha');
        }
    }