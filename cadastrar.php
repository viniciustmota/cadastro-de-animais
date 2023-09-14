<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require __DIR__.'/vendedor/autoload.php';
        use Kreait\Firebase\Factory;

        if(isset($_POST['codigo'])){
            $factory = (new Factory())->withDatabaseUrl('https://cadastro-de-animais-ca5c8-default-rtdb.firebaseio.com/');
            $database = $factory->createDatabase();
            $novaPalavra = [
                'Imagem' => $_POST['urlImagem'],
                'Nome' => $_POST['nome'],
                'Peso' => $_POST['peso']
            ];
            $database->getReference('Animais/'.$_POST['codigo'])->set($novaPalavra);
            $msg = 'Palavra adicionada com sucesso!';
        }
    
    ?>
</body>
</html>