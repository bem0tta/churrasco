<?php
    require_once '../config/conexao.php';

    if(empty($_POST['email']) || empty($_POST['senha'])){
        header('location: ../login.php');
    }

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $stmt = $con->prepare('SELECT id, senha FROM usuarios WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($usuarioId, $senhaArmazenada);

        if (!$stmt->fetch()) {
            header('Location: login.php?res=falha');
            exit;
        }

        $senhaValida = password_verify($senha, $senhaArmazenada);

        if (!$senhaValida) {
            header('Location: login.php?res=falha');
            exit;
        }

        session_start();
        $_SESSION['email'] = $email;
        header('Location: ../index.php');
        exit;
    } catch (mysqli_sql_exception $e) {
        header('Location: login.php?res=falha');
        exit;
    }