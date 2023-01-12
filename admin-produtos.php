<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['id']) || $_SESSION['id'] != 1) {
        header("location: ./");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allauto Carros | <?php print $_SESSION['nome']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <div id="titulo">
                <a href="./"> <img src="img/logo.webp" alt="Allauto Carros"> </a>
            </div>
            
            <nav>
                <ul>
                    <li>
                        <a href="./">Home</a>
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

    <section id="listar">
        <div class="container">
            <h2>Veículos Cadastrados</h2>

            <?php
                error_reporting(E_ERROR | E_PARSE);
                
                require_once("interfaces/iCrud.php");
                require_once("classes/Crud.php");

                $crud = new Crud("usuarios");

                $ids = Crud::getAllIds();

                if ($ids != null) {
                    print "<table>";
                    print "<tr>";
                    print "<th>Nome</th>";
                    print "<th>Email</th>";
                    print "<th>Ações</th>";
                    print "</tr>";

                    foreach($ids as $id) {
                        $obj = $crud->read($id);
                        
                        print "<tr>";
                        print "<td>".$obj->getNome()."</td>";
                        print "<td>".$obj->getEmail()."</td>";

                        if ($obj->getNome() != "Admin") {
                            print "<td> 
                                <form action='deletar.php' method='POST'>
                                    <input type='hidden' name='acao' value='excluir'>
                                    <input type='hidden' name='id' value='{$obj->getId()}'>
                                    <input type='hidden' name='nome' value='{$obj->getNome()}'>
                                    <button type='submit'>Excluir</button>
                                </form>
                            </td>";
                        }

                        else {
                            print "<td>    ---------------    </td>";
                        }

                        print "</tr>";
                    }
                    
                    print "</table>";
                }

                else {
                    print "<h3>Não existem usuários cadastrados</h3>";
                }
            ?> 
        </div>
    </section>
   
    <footer>
        <div class="container">
            <span>Allauto Carros, &copy;Copyright 2022</span>
        </div>
    </footer>
</body>
</html>
