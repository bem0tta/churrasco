<?php
require_once '../config/conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE participantes SET pago = true WHERE id = $id";

    if ($con->query($sql)) {
        header("Location: listar.php");
    } else {
        header("Location: listar.php?res=falha");
    }
}else {
    header("Location: listar.php?res=falha");
}