<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['nome'])) {
        $usuario = $_SESSION['nome'];
    }

    else {
        $usuario = null;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allauto Carros | Veículos</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <span><a id="login" href="<?php if (isset($usuario)) { print 'mostrar.php'; } else { print 'login.php'; } ?>"><img src="img/log-in.webp" alt="Login"><?php if (isset($usuario)) { print $usuario; } else { print 'Entrar'; } ?></a></span>

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
                        <a class="atual" href="veiculos.php">Veículos</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="produtos">
        <div class="container">
            <h1 class="teste">Nossos <span>Veículos</span></h1>

            <div class="veiculo">
                <a href="produtos/bmw-series-5.php">
                    <img src="img/products/bmw-serie-5-sedan(2).webp" alt="Bmw Série 5">
                    <h1>Bmw Série 5 - Sedan</h1>
                </a>
            </div>
            
            <div class="veiculo">
                <a href="produtos/mercedes-benz-classe-c.php">
                    <img src="img/products/mercedes-benz-classe-c(2).webp" alt="Mercedes Classe C">
                    <h1>Mercedes Classe C - Sedan</h1>
                </a>
            </div>
            
            <div class="veiculo">
                <a href="produtos/volvo-xc60.php">
                    <img src="img/products/volvo-xc60(2).webp" alt="Volvo XC60 Recharge">
                    <h1>Volvo XC60 Recharge</h1>
                </a>
            </div>
        </div>
    </section>
    
    <section id="newsletter">
        <div class="container">
            <h1>
                Se inscreva na nossa newsletter
            </h1>

            <form action="">
                <input type="email" placeholder="Email">
                <button type="submit">Inscrever-se</button>
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