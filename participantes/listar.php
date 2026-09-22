<?php
require_once '../config/conexao.php';
require_once '../includes/verificar_login.php';
$sql = 'SELECT nome, turma, tipo_churrasco as tipo, confirmado, pago from participantes';
if (isset($_GET['pesquisa'])) {
    if (!empty($_GET['pesquisa']["nome"]) || !empty($_GET['pesquisa']["pagemento"]) || !empty($_GET['pesquisa']["presenca"])) {
        $sql = $sql . " where ";

        if (!empty($_GET['pesquisa']["nome"])) {
            $sql = $sql . "nome like '%" . $_GET['pesquisa']["nome"] . "%' AND ";
        }
        switch ($_GET['pesquisa']["pagamento"]) {
            case 'pagos':
                $sql = $sql . 'pago = true AND';
                break;
            case 'pendentes':
                $sql = $sql . 'pago = false AND';
                break;
        }
        switch ($_GET['pesquisa']["presenca"]) {
            case 'confirmados':
                $sql = $sql . 'confirmado = true';
                break;
            case 'naoConfirmados':
                $sql = $sql . 'confirmado = false';
                break;
        }
    }
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
                foreach ($user as $dadoUser) {
                    echo "<td>$dadoUser</td>";
                }
                echo "<td><a href='editar.php'>Editar</a>";
                echo "<a href='excluir.php' class='excluir'>Excluir</a></td>";
            }

            echo "</tr>";
            ?>
        </tbody>
    </table>
    <script src='../js/confirmarExcluir.js'></script>
</body>
</html>