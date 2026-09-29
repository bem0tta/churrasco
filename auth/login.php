<?php
    if(isset($_GET['res']) && $_GET['res'] == 'falha'){
        echo 'Usuário não encontrado';
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/estilo.css">
    <title>Document</title>
</head>
<body>
    <form action="autenticar.php" method="post">
        <label>Digite seu e-mail <input type="email" name='email' required></label>
        <label>Digite sua senha <input type="password" name='senha' required></label>
        <button type="submit">ENVIAR</button>
    </form>
</body>
</html>