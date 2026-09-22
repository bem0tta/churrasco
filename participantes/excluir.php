<?php
require_once '../includes/verificar_login.php';
require_once '../config/conexao.php';
try {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $sql = 'delete from participantes where id = '. $_GET['id'];
        $con->query($sql);
    }
    else{
        throw new mysqli_sql_exception("Não existe get");
    }
} catch (mysqli_sql_exception $e) {
    header('location: listar.php?res = falha');
}
header('location: listar.php');