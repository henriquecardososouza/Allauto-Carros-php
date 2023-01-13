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

    if (isset($_SESSION['nome'])) {
        $usuario = $_SESSION['nome'];
    }

    else {
        $usuario = null;
    }

    $crud = new Crud("veiculos");

    $ids = $crud->getRandomFields();
    $numeros = [];

    if ($ids != null) {
        foreach($ids as $id) {
            $numeros[] = $id;
        }
    }

    else {
        for ($i = 0; $i < 4; $i++) {
            $numeros[] = null;
        }
    }

    if (count($numeros) < 4) {
        for ($i = count($numeros); $i < 4; $i++) {
            $numeros[] = null;
        }
    }

    $obj = [];

    for ($i = 0; $i < 4; $i++) {
        if ($numeros[$i] == null) {
            $obj[] = new CarNotExists();
        }

        else {
            $obj[] = $crud->read($numeros[$i], "veiculo");
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allauto Carros</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <span><a id="login" href="<?php if (isset($usuario)) { print 'usuario/mostrar.php'; } else { print 'login.php'; } ?>"><img src="img/log-in.webp" alt="Login"><?php if (isset($usuario)) { print $usuario; } else { print 'Entrar'; } ?></a></span>

            <div id="titulo">
                <a href="index.php"> <img src="img/logo.webp" alt="Allauto Carros"> </a>
            </div>
            
            <nav>
                <ul>
                    <li>
                        <a class="atual" href="index.php">Home</a>
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

    <section class="slider">
        <div class="container">
            <div id="title">
                <h1>Allauto Locadora de Automóveis</h1>
                <h2 id="description">Uma empresa que se preocupa com seus clientes</h2>
            </div>
        </div>

        <img class="slide mask" src="img/home section/slide1.webp" alt="Imagem 1">
        <img class="slide mask" src="img/home section/slide2.webp" alt="Imagem 2">
        <img class="slide mask" src="img/home section/slide3.webp" alt="Imagem 3">
        <img class="slide mask" src="img/home section/slide4.webp" alt="Imagem 4">

        <div id="mask"></div>
    </section>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("slide");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;

            if (slideIndex > slides.length) {
                slideIndex = 1
            }

            slides[slideIndex - 1].style.display = "block";
            slides[slideIndex - 1].style.width = "100%";

            setTimeout(showSlides, 8000); // Change image every 8 seconds
        }
    </script>

    <section id="products">
        <div class="h1-container">
            <h1>Nossos <label>Veículos</label></h1>
        </div>

        <div class="container">
            <a href="<?php if (get_class($obj[0]) == "Veiculo") { print "produtos/veiculo.php"; } else { print "veiculos.php"; } ?>">
                <div class="product-container">
                    <div class="produto">
                        <img src="<?php print $obj[0]->getImgSlider(); ?>" alt="">
                        <h2 class="titulo<?php if (get_class($obj[0]) != "Veiculo") { print " not-exists"; } ?>"><?php print $obj[0]->getModelo(); ?><br></h2>
                        <h2 class="preco"><span><?php if (get_class($obj[0]) == "Veiculo") { print "A partir de"; } else { print " "; } ?></span><?php print $obj[0]->getPreco(); ?></h2>
                    </div>
                </div>
            </a>

            <a href="<?php if (get_class($obj[1]) == "Veiculo") { print "produtos/veiculo.php"; } else { print "veiculos.php"; } ?>">
                <div class="product-container">
                    <div class="produto">
                        <img src="<?php print $obj[1]->getImgSlider(); ?>" alt="">
                        <h2 class="titulo<?php if (get_class($obj[1]) != "Veiculo") { print " not-exists"; } ?>"><?php print $obj[1]->getModelo(); ?><br></h2>
                        <h2 class="preco"><span><?php if (get_class($obj[1]) == "Veiculo") { print "A partir de"; } else { print "hjdgfjksd"; } ?></span><?php print $obj[1]->getPreco(); ?></h2>
                    </div>
                </div>
            </a>

            <a href="<?php if (get_class($obj[2]) == "Veiculo") { print "produtos/veiculo.php"; } else { print "veiculos.php"; } ?>">
                <div class="product-container">
                    <div class="produto">
                        <img src="<?php print $obj[2]->getImgSlider(); ?>" alt="">
                        <h2 class="titulo<?php if (get_class($obj[2]) != "Veiculo") { print " not-exists"; } ?>"><?php print $obj[2]->getModelo(); ?><br></h2>
                        <h2 class="preco"><span><?php if (get_class($obj[2]) == "Veiculo") { print "A partir de"; } else { print ".  .  ."; } ?></span><?php print $obj[2]->getPreco(); ?></h2>
                    </div>
                </div>
            </a>

            <a href="<?php if (get_class($obj[3]) == "Veiculo") { print "produtos/veiculo.php"; } else { print "veiculos.php"; } ?>">
                <div class="product-container" id="last-card">
                    <div class="produto">
                        <img src="<?php print $obj[3]->getImgSlider(); ?>" alt="">
                        <h2 class="titulo<?php if (get_class($obj[3]) != "Veiculo") { print " not-exists"; } ?>"><?php print $obj[3]->getModelo(); ?><br></h2>
                        <h2 class="preco"><span><?php if (get_class($obj[3]) == "Veiculo") { print "A partir de"; } else { print ".  .  ."; } ?></span><?php print $obj[3]->getPreco(); ?></h2>
                    </div>
                </div>
            </a>

            <div class="ver-tudo">
                <a href="veiculos.php">
                    <div id="ver-mais">
                        <img src="img/arrow-right.webp" alt="">
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section id="conheca-nos">
        <div class="container">
            <button onclick=" location.href = 'sobre.php'; ">Conheça-nos</button>
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