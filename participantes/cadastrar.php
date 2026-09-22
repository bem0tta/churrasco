<?php
    require_once('validar_login.php');
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
            <input type="text">
        </label>

        <label>Turma 
            <input type="text">
        </label>

        <label>Telefone 
            <input type="text">
        </label>

        <label>Tipo de churrasco
            <select name="tipo">
                <option value="t">Tradicional</option>
                <option value="v">Vegetariano</option>
            </select>
        </label>

        <label>Acompanhamento
            <input type="text">
        </label>

        <p>Presença confirmada</p>
        <label><input type="radio" value= "s" name="presenca"> Sim</label>
        <label><input type="radio" value= "n" name="presenca"> nao</label>

        <p>Pagamento realizado</p>
        <label><input type="radio" value= "s" name="pagamento"> Sim</label>
        <label><input type="radio" value= "n" name="pagamento"> nao</label>
    </form>
</body>
</html>