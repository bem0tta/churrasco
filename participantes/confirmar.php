<?php
    require_once '../config/conexao.php';
if (isset($_GET['id']) && isset($_GET['acao'])) {
    $id = $_GET['id'];
    $acao = $_GET['acao'];

    if ($acao == 'confirmar') {
        $sql = "UPDATE participantes SET confirmado = true WHERE id = $id";
    } else if ($acao == 'desconfirmar') {
        $sql = "UPDATE participantes SET confirmado = false WHERE id = $id";
    }

    if (isset($sql)) {
        if ($con->query($sql)) {
            header("Location: listar.php");
        } else {
            header("Location: listar.php?res=falha");
        }
    }
}