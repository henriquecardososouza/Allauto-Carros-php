<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["nome"])) {
        header("location: ../");
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
    
    <section id="form-cad-veiculo">
        <form enctype="multipart/form-data" action="salvar.php" method="POST">
            <h1>Editar Veículo</h1>

            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php print $_POST['id']; ?>">
            <input type="text" name="modelo" placeholder="Modelo" value="<?php print ''.$_POST['modelo'].''; ?>" required>
            <input type="text" name="marca" placeholder="Marca" value="<?php print ''.$_POST['marca'].''; ?>" required>
            <input type="text" name="preco" placeholder="Preço" value="<?php print ''.$_POST['preco'].''; ?>" required>
            <br>
            <label>Imagem para o card</label>
            <br>
            <input type="file" name="imageSlider" required>
            <br>
            <br>
            <label>Imagem para a página de veículos</label>
            <br>
            <input type="file" name="imagePageVeiculo" required>
            <br>
            <button class="btn-cancel" onclick="location.href='administrar.php'">Cancelar</button>
            <button type="submit">Editar</button>
        </form>        
    </section>

    <footer>
        <div class="container">
            <span>Allauto Carros, &copy;Copyright 2022</span>
        </div>
    </footer>
</body>
</html>