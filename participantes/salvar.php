<?php
    require_once 'validar_login.php';
    require_once 'conexao.php';

    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipo'];
    $acompanhamento = $_POST['acompanhamento'];
    $presenca = $_POST['presenca'];
    $pagamento = $_POST['pagamento'];

    $sql = 'INSERT INTO participantes VALUES('.
        $nome.','.$turma.','.$telefone.','.$tipo.','.$acompanhamnento.','.$presenca.','.$pagamento
        .')';

    try{
        $con->query($sql);
    } catch(mysqli_sql_exception $e){
        alert('Não foi possível cadastrar');
        header('location: cadastrar.php');
    }
?>