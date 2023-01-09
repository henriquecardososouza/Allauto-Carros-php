<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['nome'])) {
        header("location: ./");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allauto Carros | Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <div id="titulo">
                <a href="index.php"> <img src="img/logo.webp" alt="Allauto Carros"> </a>
            </div>
            
            <nav>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    
                    <li>
                        <a href="sobre.php">Sobre</a>
                    </li>
                    
                    <li>
                        <a href="veiculos.php">Veículos</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="login-form">
        <div class="form">
            <h1>Entrar</h1>
            <br>
            <form action="php/salvar.php" method="POST">
                <input type="hidden" name="acao" value="verificar">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <br>
                <button type="submit">Entrar</button>
                <a href="sign.php">Cadastrar</a>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <span>Allauto Carros, &copy;Copyright 2022</span>
        </div>
    </footer>
</body>
</html>
