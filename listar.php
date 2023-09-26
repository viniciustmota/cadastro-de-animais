<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;


$factory = (new Factory())->withDatabaseUri('https://cadastro-de-animais-ca5c8-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
$palavra = $database->getReference('Animais')->getSnapshot();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de animais</title>
    <link rel="stylesheet" href="./assets/css/estilos.css">
    <link rel="stylesheet" href="./assets/css/listar.css">
</head>

<body>
    <h1 class="title">Listas dos animais </h1>
    <ul>
        <?php foreach ($palavra->getValue() as $palavra) : ?>

                <li class="card__animals">
                    <div class="content__img">
                        <figure>
                            <img src=<?php echo $palavra['Imagem'] ?> alt="Erro" srcset="">
                        </figure>
                    </div>
                    <div class="content__text">
                        <p><?php echo $palavra['Nome'] ?></p>
                        
                        <p class="pesoBD"><?php echo $palavra['Peso'] ?></p>
                    </div>
                </li>
        <?php endforeach; ?>
    </ul>
    <!-- <script src="./assets/js/app.js"></script> -->
    <script>
        let peso = document.querySelectorAll(".pesoBD");
        
        peso.forEach(e => {
            if (e.innerHTML >= 1000){
            e.innerHTML = e.innerHTML/1000 + "T"
        }else{
            e.innerHTML = e.innerHTML + "Kg"
        }
        });
        
    </script>
</body>

</html>