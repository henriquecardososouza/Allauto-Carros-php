<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nome'])) {
        header("location: ./");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allauto Carros | Edit</title>
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

    <section id="edit-form">
        <div class="form">
            <h1>Editar</h1>
            <br>
            <form action="salvar.php" method="POST">
                <input type="hidden" name="acao" value="editar">

                <input id="nome-field" type="text" name="nome" placeholder="Nome" value="<?php print $_SESSION['nome']; ?>" required>
                <input type="email" name="email" placeholder="Email" value="<?php print $_SESSION['email']; ?>" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <br>
                <button type="submit">Editar</button>
                <button class="btn-cancel" onclick=" location.href = 'mostrar.php'; ">Cancelar</button>
            </form>
        </div>
    </section>

    <script>
        let nome = document.getElementById("nome-field");

        if (nome.value == "Admin") {
            nome.readOnly = true;
        }

        else {
            nome.readOnly = false;
        }
    </script>

    <footer>
        <div class="container">
            <span>Allauto Carros, &copy;Copyright 2022</span>
        </div>
    </footer>
</body>
</html>
