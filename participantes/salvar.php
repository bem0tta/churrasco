<?php
    require_once 'includes/validar_login.php';
    require_once 'config/conexao.php';

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
        Seaslog::alert('Participante cadastrado!');
        header('location: listar.php');
    } catch(mysqli_sql_exception $e){
        Seaslog::alert('Não foi possível cadastrar!');
        header('location: cadastrar.php');
    }
?>