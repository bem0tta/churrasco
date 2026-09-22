<?php
    require_once '../includes/verificar_login.php';
    require_once '../config/conexao.php';

    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipo'];
    $acompanhamento = $_POST['acompanhamento'];
    $presenca = $_POST['presenca'];
    $pagamento = $_POST['pagamento'];

    $sql = "UPDATE participantes
        SET nome = '$nome',
            turma = '$turma',
            telefone = '$telefone',
            tipo_churrasco = '$tipo',
            acompanhamento = '$acompanhamento',
            confirmado = '$presenca',
            pago = '$pagamento'
        WHERE id = '$id'";

    try{
        $con->query($sql);
        header('location: listar.php');
    } catch(mysqli_sql_exception $e){
        header('location: listar.php?res = falha');
    }
?>