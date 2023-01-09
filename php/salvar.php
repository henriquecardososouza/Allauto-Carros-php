<?php

    if (!isset($_SESSION)) {
        session_start();
    }
    
    error_reporting(E_ERROR | E_PARSE);
    require_once("../classes/Crud.php");
    require_once("../classes/Usuario.php");

    $crud = new Crud("usuarios");

    $acao = $_POST['acao'];

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    switch ($acao) {
        case "cadastrar": {
            $obj = new Usuario($nome, $email, $senha);

            if ($crud->create($obj)) {
                $_SESSION['nome'] = $obj->getNome();
                $_SESSION['email'] = $obj->getEmail();
                $_SESSION['id'] = $obj->getId();

                echo "<script> alert('Usuário cadastrado com sucesso!') </script>";
                header("location: ../mostrar.php");
            }

            else {
                echo "<script> alert('Ocorreu um erro ao tentar cadastrar o usuário!') </script>";
                header("location: ../sign.php");
            }

            break;
        }

        case "verificar": {
            $ids = Crud::getAllIds();

            foreach($ids as $id) {
                $obj = $crud->read($id);

                if ($obj->getNome() == $nome && $obj->getSenha() == $senha) {
                    if (!isset($_SESSION)) {
                        session_start();
                    }

                    $_SESSION['nome'] = $obj->getNome();
                    $_SESSION['email'] = $obj->getEmail();
                    $_SESSION['id'] = $obj->getId();

                    echo "<script> alert('Bem vindo {$obj->getNome()}!'); </script>";
                    header("location: ../mostrar.php");

                    return;
                }
            }

            echo "<script> alert('Usuário ou senha inválidos!'); </script>";
            header("location: ../login.php");

            break;
        }

        case "excluir": {
            if ($crud->delete($id)) {
                echo "<script> alert('Usuário excluído com sucesso!'); </script>";
            }

            else {
                echo "<script> alert('Ocorreu um erro ao tentar excluir o usuário!'); </script>";
            }
            
            if (isset($_POST['return'])) {
                header("location: logout.php");
            }

            else {
                header("location: ../listar.php");
            }
           
            break;
        }

        case "editar": {
            $obj = new Usuario($nome, $email, $senha);
            $obj->setId($_SESSION['id']);

            if ($crud->update($obj)) {
                session_destroy();
                session_start();

                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $obj->getId();

                echo "<script> alert('Dados atualizados com sucesso!'); </script>";
            }

            else {
                echo "<script> alert('Ocorreu um erro ao tentar atualizar os dados do usuário!'); </script>";
            }

            header("location: ../mostrar.php");
            break;
        }

        default: {
            header("location: ../");
        }
    }

?>