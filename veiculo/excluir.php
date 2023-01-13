<?php

    error_reporting(E_ERROR | E_PARSE);
    include("interfaces/iCrud.php");
    include("classes/Config.php");
    include("classes/Connection.php");
    include("classes/Usuario.php");
    include("classes/Veiculo.php");
    include("classes/CarNotExists.php");
    include("classes/Crud.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nome'])) {
        header("location: ./");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allauto Carros | <?php print $_SESSION["nome"]; ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="titulo">
                <a href="../"> <img src="../img/logo.webp" alt="Allauto Carros"> </a>
            </div>
            
            <nav>
                <ul>
                    <li>
                        <a href="../">Home</a>
                    </li>
                    
                    <li>
                        <a href="../sobre.php">Sobre</a>
                    </li>
                    
                    <li>
                        <a href="../veiculos.php">Veículos</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="excluir">
        <div class="container">
            <h1>Deseja realmente excluir o veículo selecionado?</h1>

            <form action="salvar.php" method="POST">
                <input type="hidden" name='acao' value="excluir">
                <input type="hidden" name="id" value="<?php print $_POST['id']; ?>">
                <button type="submit">Excluir</button>
            </form>

            <button onclick=" location.href = 'administrar.php'; ">Cancelar</button>
        </div>
    </section>
   
    <footer>
        <div class="container">
            <span>Allauto Carros, &copy;Copyright 2022</span>
        </div>
    </footer>
    
</body>
</html>