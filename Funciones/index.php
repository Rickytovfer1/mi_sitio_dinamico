

<?php
$prueba = "pera";
function saludar(){
    echo "hola";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi primer sitio modular con PHP</title>
</head>

<body >
  <div>
        <h1><?=saludar()?></h1>
        <h1><?=$prueba?></h1>

  </div>
</body>
</html>
