<?php

$url = "https://rickandmortyapi.com/api/character/42"; 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
$info = $data; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rick and Morty </title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; justify-content: center; padding: 20px; background-color: #e9edef; }
        .card { background: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); overflow: hidden; width: 350px; }
        .card-header { background: #28a7a5; color: white; padding: 15px; text-align: center; }
        .card-body { padding: 20px; }
        .flag { width: 100%; height: auto; border-bottom: 1px solid #dddddd; }
        
        ul { list-style: none; padding: 0; }
        li { margin-bottom: 10px; border-bottom: 1px solid #eeeeee; padding-bottom: 5px; }
    </style>
</head>
<body>

    <div class="card">
        <img src="<?php echo $info['image']; ?>" alt="Personaje" class="flag">

        <div class="card-header">
            <h2><?php echo $info['name']; ?></h2>
        </div>

        <div class="card-body">
            <ul>
                <li><strong>Estado:</strong> <?php echo $info['status']; ?></li>
                <li><strong>Especie:</strong> <?php echo $info['species']; ?></li>
                <li><strong>Género:</strong> <?php echo $info['gender']; ?></li>
                <li><strong>Origen:</strong> <?php echo $info['origin']['name']; ?></li>
                <li><strong>Ubicación:</strong> <?php echo $info['location']['name']; ?></li>
            </ul>
        </div>
    </div>

</body>
</html>
