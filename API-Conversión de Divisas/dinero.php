<?php

$url = "https://open.er-api.com/v6/latest/USD";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
$valor=$data['rates']['MXN'];
if($_SERVER["REQUEST_METHOD"] =="POST"){

$cantidad_usd = floatval($_POST['cantidad']);
$cantidad_mxn = $cantidad_usd * $valor;

echo"<h2> Resultado de la conversion: </h2";

echo "<p>$ ". number_format($cantidad_usd,2)
. "USD son $" . number_format($cantidad_mxn,2)
."MXN</p>";
}



?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Dinero</title>
</head>
<body>
    <h1> Dinero </h1>
    <form method="post" actions="">
        <label for="cantidad"> Cantidad en USD:
</label>
<input type="number" id="cantidad"
name="cantidad" step="0.1" required>
<button type="submint"> Convertir</button>

</form>


</body>
</html>