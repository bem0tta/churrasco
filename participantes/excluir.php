<?php
require_once 'validar_login.php';
require_once 'conexao.php';

try {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $sql = 'delete * from participantes where id = '. $_GET['id'];
        $con->query($sql);
        alert('Excluido com sucesso');
    }
    else{
        throw new Error("Não existe get");
    }
} catch (mysqli_sql_exception $e) {
    alert('Não foi possível excluir');
}
header('location: listar.php');