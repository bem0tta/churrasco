<?php
    require_once '../includes/verificar_login.php';
    require_once '../config/conexao.php';
    if(!isset($_GET['id'])){
        header('location: index.php');
    }
    $sql = "select * from participantes where id = ".$_GET['id'];
    $resposta = $con->query($sql);
    $res = mysqli_fetch_assoc($resposta);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <form action="atualizar.php?id=<?php echo $_GET['id']?>" method="post">
        <label>Nome 
            <input type="text" name="nome" value = "<?php echo $res['nome']?>">
        </label>

        <label>Turma 
            <input type="text" name="turma" value = "<?php echo $res['turma']?>">
        </label>

        <label>Telefone 
            <input type="text" name="telefone" value = "<?php echo $res['telefone']?>">
        </label>

        <label>Tipo de churrasco
            <select name="tipo" value = "<?php echo $res['tipo_churrasco']?>">
                <option value="tradicional" >Tradicional</option>
                <option value="vegetariano">Vegetariano</option>
            </select>
        </label>

        <label>Acompanhamento
            <input type="text" name="acompanhamento" value = "<?php echo $res['acompanhamento']?>">
        </label>

        <p>Presença confirmada</p>
        <label><input type="radio" value="1" name="presenca" <?php echo $res['confirmado'] ? 'checked' : ''?>> Sim</label>
        <label><input type="radio" value="0" name="presenca" <?php echo $res['confirmado'] ? '' : 'checked'?>> Não</label>

        <p>Pagamento realizado</p>
        <label><input type="radio" value= "1" name="pagamento" <?php echo $res['pago'] ? 'checked' : ''?>> Sim</label>
        <label><input type="radio" value= "0" name="pagamento" <?php echo $res['pago'] ? '' : 'checked'?>> Não</label>

        <button type="submit">ENVIAR</button>
    </form>
</body>
</html>