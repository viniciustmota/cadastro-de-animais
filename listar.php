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
</head>
<body>
    <table>
        <tread>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Peso</th>
            </tr>
        </tread>
        <?php foreach($palavra->getValue() as $palavra) : ?>
            <tbody>
                <tr>
                    <td><img src=<?php echo $palavra['Imagem'] ?> alt="Erro" srcset=""></td>
                    <td><?php echo $palavra['Nome'] ?></td>
                    <td><?php echo $palavra['Peso'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
</body>
</html>