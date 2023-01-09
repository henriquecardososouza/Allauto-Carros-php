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
    <title>Allauto Carros</title>
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
        <img class="slide mask" src="img/home section/slide1.webp" alt="Imagem 1">
        <img class="slide mask" src="img/home section/slide2.webp" alt="Imagem 2">
        <img class="slide mask" src="img/home section/slide3.webp" alt="Imagem 3">
        <img class="slide mask" src="img/home section/slide4.webp" alt="Imagem 4">

        <div class="container">
            <div id="title">
                Allauto Locadora de Automóveis
                <br>
                <div id="description">
                    Uma empresa que se preocupa com seus clientes
                </div>
            </div>
        </div>

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
        <div class="container">
            <h1>Nossos <label>Veículos</label></h1>

            <div class="produto" id="bmw">
                <a href="produtos/bmw-series-5.php">
                    <img src="img/products/bmw-serie-5-sedan.webp" alt="Bmw Série 5 - Sendan">
                    <span class="titulo">Bmw Série 5</span>
                    <br>
                    <br>
                    <span class="preco"><label>A partir de</label> R$ 450.950,00</span>
                </a>
            </div>

            <div class="produto" id="mercedes">
                <a href="produtos/mercedes-benz-classe-c.php">
                    <img src="img/products/mercedes-benz-classe-c.webp" alt="Mercedes Benz Classe C">
                    <span class="titulo">Mercedes Benz Classe C</span>
                    <br>
                    <br>
                    <span class="preco"><label>A partir de</label> R$ 359.900,00</span>
                </a>
            </div>

            <div class="produto" id="volvo">
                <a href="produtos/volvo-xc60.php">
                    <img src="img/products/volvo-xc60.webp" alt="Volvo XC60">
                    <span class="titulo">Volvo XC60</span>
                    <br>
                    <br>
                    <span class="preco"><label>A partir de</label> R$ 465.950,00</span>
                </a>
            </div>
        </div>
    </section>

    <section id="conheca-nos">
        <div class="container">
            <button onclick=" location.href = 'sobre.php'; " type="submit">Conheça-nos</button>
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