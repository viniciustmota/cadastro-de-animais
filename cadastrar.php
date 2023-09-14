<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

if (isset($_POST['codigo'])) {
    $factory = (new Factory())->withDatabaseUrl('https://cadastro-de-animais-ca5c8-default-rtdb.firebaseio.com/');
    $database = $factory->createDatabase();
    $novaPalavra = [
        'Imagem' => $_POST['urlImagem'],
        'Nome' => $_POST['nome'],
        'Peso' => $_POST['peso']
    ];
    $database->getReference('Animais/' . $_POST['codigo'])->set($novaPalavra);
    $msg = 'Palavra adicionada com sucesso!';
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="./assets/css/estilos.css">
</head>

<body>
<form name="cadastro" method="POST">
    <div class="container">
        Imagem: <input type="text" name="urlImagem" id="imagem" value="">
        Nome: <input type="text" name="nome" id="nome" value="">
        Peso: <input type="text" name="peso" id="peso" value="">
        <input type="submit" value="Salvar">
        <a href="./index.php">voltar</a>
    </div>

</form>
</body>

</html>