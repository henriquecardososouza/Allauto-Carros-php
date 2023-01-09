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
    <title>Allauto Carros | Sobre</title>
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
                        <a class="atual" href="sobre.php">Sobre</a>
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

    <section id="sobre">
        <div class="container">
            <div id="o-que-fazemos">
                <h1>O que <span>fazemos</span></h1>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, est repellendus magni et illo quod tenetur odio reprehenderit neque obcaecati, eligendi architecto consectetur nemo nesciunt beatae. Quaerat odit blanditiis Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit cumque laboriosam, unde iusto provident assumenda repudiandae facilis commodi, impedit velit minus dolor perspiciatis? Officiis provident ipsam sequi culpa ad repudiandae.
                </p>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem vero saepe quasi expedita dolor explicabo architecto soluta illo placeat, at voluptas, quaerat quia assumenda quas similique omnis nam facere animi? Lorem ipsum dolor sit amet consectetur, adipisicing elit. At dolor tempore dolorem, sit esse ratione ut autem eos quo voluptatibus repudiandae nobis. Explicabo animi aut velit! Quibusdam repudiandae quasi voluptate.
                </p>
            </div>

            <br>
            <br>
            <br>

            <div id="o-que-fazemos">
                <h1>Quem <span>Somos</span></h1>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, est repellendus magni et illo quod tenetur odio reprehenderit neque obcaecati, eligendi architecto consectetur nemo nesciunt beatae. Quaerat odit blanditiis Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit cumque laboriosam, unde iusto provident assumenda repudiandae facilis commodi, impedit velit minus dolor perspiciatis? Officiis provident ipsam sequi culpa ad repudiandae.
                </p>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem vero saepe quasi expedita dolor explicabo architecto soluta illo placeat, at voluptas, quaerat quia assumenda quas similique omnis nam facere animi? Lorem ipsum dolor sit amet consectetur, adipisicing elit. At dolor tempore dolorem, sit esse ratione ut autem eos quo voluptatibus repudiandae nobis. Explicabo animi aut velit! Quibusdam repudiandae quasi voluptate.
                </p>
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