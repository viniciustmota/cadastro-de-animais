<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$msg = ''; // Inicialize a mensagem de erro/vitória

if (isset($_POST['nome'])) {
    try {
        $factory = (new Factory())->withDatabaseUri('https://cadastro-de-animais-ca5c8-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();
        $novaPalavra = [
            'Imagem' => $_POST['imagem'],
            'Nome' => $_POST['nome'],
            'Peso' => $_POST['peso']
        ];
        $database->getReference('Animais/'.$_POST['nome'])->set($novaPalavra);
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
    <link rel="stylesheet" href="./assets/css/cadastrar.css">
</head>

<body class="corpo">
    <h1 class="cadastrar__titulo">Adicione um animal</h1>
    <form name="cadastro" method="POST" class="formulario">
        <div class="container">
            <label tabindex="0" class="picture">
                <input type="file" accept="image/*" class="picture__input" id="imagem">
                <input type="text" name="imagem" class="picture__input-manda-url" required>
                <span class="picture__image">
                    <img src="./assets/img/Upload.png" class="picture__img">
                </span>
            </label>
            Nome: <input type="text" name="nome" id="nome" required>
            Peso: <input type="text" name="peso" id="peso"  maxlength="6" placeholder="Colocar peso em Kg" required>
            <input type="submit" value="Salvar" class="container__btn">
            <a href="./index.php" class="container__btn">voltar</a>
        </div>

    </form>
    <p><?php echo $msg; ?></p> <!-- Exibe a mensagem de erro ou sucesso -->
    <footer class="rodape">
        <p class="rodape__descricao">Vinicius & Marcio</p>
    </footer>

    <script src="./assets/js/app.js"></script>
</body>

</html>
