<?php

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
    <title>Allauto Carros | <?php print $_SESSION['nome'] ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="titulo">
                <a href="../index.php"> <img src="../img/logo.webp" alt="Allauto Carros"> </a>
            </div>
            
            <nav>
                <ul>
                    <li>
                        <a href="../index.php">Home</a>
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

    <section id="mostrar">
        <div class="container">
            <h1><?php print ''.$_SESSION['nome'].''; ?></h1>
            <br>
            <label>Email: <?php print ''.$_SESSION['email'].''; ?></label>
            <br>

            <?php
                if ($_SESSION['id'] == 1) {
                    print "<br> <button class='botao' onclick='location.href=\"listar.php\"'>Administrar Usuários</button>";
                    print "<br> <button class='botao produtos' onclick='location.href=\"../veiculo/administrar.php\"'>Administrar Veículos</button>";
                }

                else {
                    print "<br> <button class=\"botao excluir\" onclick=\" location.href = 'excluir.php'; \">Excluir</button>";
                }
            ?>
            
            <br>
            <button class="botao editar" onclick=" location.href = 'editar.php'; ">Editar</button>
            <br>
            <button class="botao sair" onclick=" location.href = 'logout.php'; ">Sair</button>
            
        </div>
    </section>
    
    <footer>
        <div class="container">
            <span>Allauto Carros, &copy;Copyright 2022</span>
        </div>
    </footer>
</body>
</html>