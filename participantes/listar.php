<?php
require_once '../config/conexao.php';
require_once '../includes/verificar_login.php';

if(isset($_GET['res']) && $_GET['res'] == 'falha'){
    echo 'A operação falhou';
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>

<body>
    <form method="get">
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
        <button type="submit">Filtrar</button>
        <button type="reset">Limpar</button>
    </form>
    <table>
        <thead>
            <th>Nome</th>
            <th>Turma</th>
            <th>Tipo</th>
            <th>Presença</th>
            <th>Pagamento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php
            echo "<tr>";

            while ($user = $res->fetch_assoc()) {
                foreach ($user as $chave =>$dadoUser) {
                    if ($chave !== 'id') {
                        echo "<td>$dadoUser</td>";
                    }
                }
                echo "<td><a href='editar.php?id=". $user['id'] ."'>Editar</a>";
                echo "<a href='excluir.php?id=". $user['id'] ."' class='excluir'>Excluir</a></td>";
            }

            echo "</tr>";
            ?>
        </tbody>
    </table>
    <script src='../js/confirmarExcluir.js'></script>
</body>
</html>