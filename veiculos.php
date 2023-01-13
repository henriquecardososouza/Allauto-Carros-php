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

    error_reporting(E_ERROR | E_PARSE);
    include_once("classes/Config.php");
    include_once("classes/Connection.php");
    include_once("interfaces/iCrud.php");
    include_once("classes/Veiculo.php");
    include_once("classes/Crud.php");

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
            <span><a id="login" href="<?php if (isset($usuario)) { print 'usuario/mostrar.php'; } else { print 'login.php'; } ?>"><img src="img/log-in.webp" alt="Login"><?php if (isset($usuario)) { print $usuario; } else { print 'Entrar'; } ?></a></span>

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
            <h1>Nossos <span>Veículos</span></h1>

            <?php

                $crud = new Crud("veiculos");

                $ids = $crud->getAllIds();

                if ($ids == null) {
                    print "<h1>No momento não existem veículos em estoque</h1>";
                }

                else {
                    foreach($ids as $id) {
                        $obj = $crud->read($id, "veiculo");

                        print "
                        <a href='produtos/veiculo.php'>
                            <div class='veiculo'>
                                <img src=".$obj->getImgPageVeiculo()." alt=".$obj->getModelo().">
                                <h1>".$obj->getModelo()."</h1>
                            </div>
                        </a>
                        ";
                    }
                }

            ?>
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