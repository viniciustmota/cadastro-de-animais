<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$msg = ''; // Inicialize a mensagem de erro/vitória

if (isset($_POST['codigo'])) {
    try {
        $factory = (new Factory())->withDatabaseUri('https://cadastro-de-animais-ca5c8-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();
        $novaPalavra = [
            'Imagem' => $_POST['imagem'],
            'Nome' => $_POST['nome'],
            'Peso' => $_POST['peso']
        ];
        $database->getReference('Animais/'.$_POST['codigo'])->set($novaPalavra);
        $msg = 'Palavra adicionada com sucesso!';
    } catch (\Exception $e) {
        $msg = 'Erro ao adicionar a palavra: ' . $e->getMessage();
    }
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
            Imagem: <input type="text" name="imagem" id="imagem" value="">
            Nome: <input type="text" name="nome" id="nome" value="">
            Peso: <input type="text" name="peso" id="peso" value="">
            <input type="submit" value="Salvar">
            <a href="./index.php">voltar</a>
        </div>

    </form>
    <p><?php echo $msg; ?></p> <!-- Exibe a mensagem de erro ou sucesso -->
</body>

</html>
