<?php
require_once '../config/conexao.php';
require_once '../includes/verificar_login.php';
include_once '../includes/cabecalho.php';

if (isset($_GET['res']) && $_GET['res'] == 'falha') {
    echo '<span class="feedback">A operação falhou</span>';
}

$sql = "SELECT id, nome, turma, tipo_churrasco AS tipo, confirmado, pago
        FROM participantes";

$condicoes = [];

if (isset($_GET['pesquisa'])) {

    $pesquisa = $_GET['pesquisa'];

    if (!empty($pesquisa['nome'])) {
        $nome = $pesquisa['nome'];
        $condicoes[] = "nome LIKE '%$nome%'";
    }

    if (isset($pesquisa['pagamento'])) {
        switch ($pesquisa['pagamento']) {
            case 'pagos':
                $condicoes[] = "pago = true";
                break;

            case 'pendentes':
                $condicoes[] = "pago = false";
                break;
        }
    }

    if (isset($pesquisa['presenca'])) {
        switch ($pesquisa['presenca']) {
            case 'confirmados':
                $condicoes[] = "confirmado = true";
                break;

            case 'naoConfirmados':
                $condicoes[] = "confirmado = false";
                break;
        }
    }
}

if (!empty($condicoes)) {
    $sql .= " WHERE " . implode(" AND ", $condicoes);
}
try {
    $res = $con->query($sql);
} catch (mysqli_sql_exception $e) {
    echo $e;
}
function verificarSituacao($presenca, $pago){
    $situacao = '';
    if ($presenca && $pago) {
        $situacao = 'Inscrição regularizada';
    }
    else if ($presenca && !$pago) {
        $situacao = 'Pagamento pendente';
    } else {
        $situacao = 'Aguardando confirmação';
    } 
    return $situacao;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/estilo.css">
    <title>Listar</title>
</head>

<body>
    <a href="../index.php" class='acoes' id='voltar'>VOLTAR</a>

    <form method="get" id='filtro'>
        <label>
            <span>Pesquisar Participantes</span>
            <input type="text" name="pesquisa[nome]">
        </label>
        <label>
            <span>Pagamento</span>
            <select name="pesquisa[pagamento]">
                <option value="todos">Todos</option>
                <option value="pagos">Pagos</option>
                <option value="pendentes">Pendentes</option>
            </select>
        </label>
        <label>
            <span>Presença</span>
            <select name="pesquisa[presenca]">
                <option value="todos">Todos</option>
                <option value="confirmados">Confirmados</option>
                <option value="naoConfirmados">Não confirmados</option>
            </select>
        </label>
        <button type="submit" class='btn-filtro'>Filtrar</button>
        <button type="reset" class='btn-filtro'>Limpar</button>
    </form>
    <table>
        <thead>
            <th>Nome</th>
            <th>Turma</th>
            <th>Tipo</th>
            <th>Presença</th>
            <th>Pagamento</th>
            <th>Situação</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php

            while ($user = $res->fetch_assoc()) {
                echo "<tr>";
                foreach ($user as $chave => $dadoUser) {
                    
                    if ($chave == 'confirmado') {
                        echo "<td>" . ($dadoUser ? 'Sim' : 'Não') . "</td>";
                    }
                    else if ($chave == 'pago') {
                        echo "<td>" . ($dadoUser ? 'Sim' : 'Não') . "</td>";
                    }
                    else if ($chave !== 'id') {
                        echo "<td>$dadoUser</td>";
                    }
                }
                echo "<td><a href='editar.php?id=" . $user['id'] . "' class='acoes'>Editar</a>";
                echo "<span data-id='".$user['id']."' class='excluir acoes'>Excluir</span></td>";
                if ($user['confirmado']) {
                    echo "<td><a href='confirmar.php?id=" . $user['id'] . "&acao=desconfirmar' class='acoes'>Desconfirmar presença</a></td>";
                } else {
                    echo "<td><a href='confirmar.php?id=" . $user['id'] . "&acao=confirmar' class='acoes'>Confirmar presença</a></td>";
                }
                if (!$user['pago']) {
                    echo "<td><a href='pagar.php?id=" . $user['id'] ."' class='acoes'>Confirmar pagamento</a></td>";
                }
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
    <a href="cadastrar.php">Cadastrar novo participante</a>
    <script src='../js/confirmarExcluir.js'></script>
</body>

</html>