<?php
    require_once '../includes/verificar_login.php';
    require_once '../config/conexao.php';

    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipo'];
    $acompanhamento = $_POST['acompanhamento'];
    $presenca = $_POST['presenca'];
    $pagamento = $_POST['pagamento'];

    $sql = "INSERT INTO participantes (nome, turma, telefone, tipo_churrasco, acompanhamento, confirmado, pago) VALUES( '$nome', '$turma', '$telefone', '$tipo', '$acompanhamento', $presenca, $pagamento)";

    try{
        $con->query($sql);
        header('location: listar.php');
    } catch(mysqli_sql_exception $e){
        header('location: listar.php?res=falha');
    }
?>