<?php
    require_once '../includes/verificar_login.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <form action="salvar.php" method="post">
        <label>Nome 
            <input type="text" name="nome" id="nome">
        </label>

        <label>Turma 
            <input type="text" name="turma" id="turma">
        </label>

        <label>Telefone 
            <input type="text" name="telefone" id="telefone">
        </label>

        <label>Tipo de churrasco
            <select name="tipo" id="tipo">
                <option value="tradicional">Tradicional</option>
                <option value="vegetariano">Vegetariano</option>
            </select>
        </label>

        <label>Acompanhamento
            <input type="text" name="acompanhamento" id="acompanhamento">
        </label>

        <p>Presença confirmada</p>
        <label><input type="radio" value="1" name="presenca"> Sim</label>
        <label><input type="radio" value="0" name="presenca"> Não</label>

        <p>Pagamento realizado</p>
        <label><input type="radio" value= "1" name="pagamento" > Sim</label>
        <label><input type="radio" value= "0" name="pagamento" > Não</label>

        <button type="submit" id="btn">ENVIAR</button>
    </form>
    <script src='../js/script.js'></script>
</body>
</html>