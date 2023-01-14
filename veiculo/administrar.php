<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['id']) || $_SESSION['id'] != 1) {
        header("location: ./");
    }

    error_reporting(E_ERROR | E_PARSE);
    include_once("../interfaces/iCrud.php");
    include_once("../classes/Config.php");
    include_once("../classes/Connection.php");
    include_once("../classes/Veiculo.php");
    include_once("../classes/Crud.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allauto Carros | <?php print $_SESSION['nome']; ?></title>
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

    <section id="listar-veiculos">
        <div class="container">
            <h2>Veículos Cadastrados</h2>

            <?php

                $crud = new Crud("veiculos");

                $ids = Crud::getAllIds();

                if ($ids != null) {
                    print "<table>";
                    print "<tr>";
                    print "<th>Modelo</th>";
                    print "<th>Marca</th>";
                    print "<th>Preço</th>";
                    print "<th>-------</th>";
                    print "<th>-------</th>";
                    print "</tr>";

                    foreach($ids as $id) {
                        $obj = $crud->read($id, "veiculo");
                        print "<tr>";
                        print "<td>".$obj->getModelo()."</td>";
                        print "<td>".$obj->getMarca()."</td>";
                        print "<td>".$obj->getPreco()."</td>";
                        print "<td>
                                <form action='editar.php' method='POST'>
                                    <input type='hidden' name='id' value='".$obj->getId()."'>
                                    <input type='hidden' name='modelo' value='".$obj->getModelo()."'>
                                    <input type='hidden' name='marca' value='".$obj->getMarca()."'>
                                    <input type='hidden' name='preco' value='".$obj->getPreco()."'>
                                    <button class='btn editar' type='submit'>Editar</button>
                                </form>
                            </td>";

                        print "<td>
                                <form action='excluir.php' method='POST'>
                                    <input type='hidden' name='id' value='".$obj->getId()."'>
                                    <button class='btn excluir' type='submit'>Excluir</button>
                                </form>
                            </td>";
                        print "</tr>";
                    }
                    
                    print "</table>";
                }

                else {
                    print "<h3>Não existem veículos cadastrados</h3>";
                }
            ?> 
        </div>

        <div class="container">
            <button class="btn cadastrar" onclick="location.href = 'cadastrar.php'">Cadastrar Veículo</button>
        </div>
    </section>
   
    <footer>
        <div class="container">
            <span>Allauto Carros, &copy;Copyright 2022</span>
        </div>
    </footer>
</body>
</html>
