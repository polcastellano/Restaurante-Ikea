<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['controller'])){
            echo 'quieres realizar una accion sobre'.$_GET['controller'];
            if (isset($_GET['action'])) {
                echo 'Sobre'.$_GET['controller'].'quieres mostrar la pagina'.$_GET['action'];
            }else{
                echo 'No me has pasado controller';
            }
        }
        
    ?>
    
</body>
</html>