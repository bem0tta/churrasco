<?php
require_once 'includes/verificar_login.php';
require_once 'config/conexao.php';
$sql = "SELECT COUNT(*) as total, COALESCE(SUM(tipo_churrasco = 'tradicional'), 0) AS carnivoros, COALESCE(SUM(confirmado), 0) as confirmados, COALESCE(SUM(pago), 0) as pagamentosFeitos FROM participantes";
try {
    $res = $con->query($sql);
    $res = $res->fetch_assoc();
} catch (mysqli_sql_exception $e) {
    echo $e;
}
$vegetarianos = (int)$res["total"] - (int)$res["carnivoros"];

var_dump($res["total"]);
var_dump($res["carnivoros"]);
var_dump($vegetarianos);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <h1>CHURRASCO DA SEMANA FARROUPILHA</h1>
    <div style="display: flex; flex-direction: column;">
        <span>Total de inscritos: <?php echo $res["total"] ?></span>
        <span>Confirmados: <?php echo $res["confirmados"] ?></span>
        <span>Não confirmados: <?php echo (int) $res["total"] - (int) $res["confirmados"] ?></span>
        <span>Pagamentos realizados: <?php echo $res["pagamentosFeitos"] ?></span>
        <span>Pagamentos pendentes: <?php echo (int) $res["total"] - (int) $res["pagamentosFeitos"] ?></span>
        <span>Churrasco tradicional: <?php echo $res["carnivoros"] ?></span>
        <span>Vegetariano: <?php echo (int) $res["total"] - (int) $res["carnivoros"] ?></span>
    </div>
</body>

</html>