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
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    switch ($acao) {
        case "cadastrar": {
            $obj = new Usuario($nome, $email, $senha);

            if ($crud->create($obj)) {
                $_SESSION['nome'] = $obj->getNome();
                $_SESSION['email'] = $obj->getEmail();
                $_SESSION['id'] = $obj->getId();

                echo "<script> alert('Usuário cadastrado com sucesso!'); location.href = '../mostrar.php'; </script>";
            }

            else {
                echo "<script> alert('Ocorreu um erro ao tentar cadastrar o usuário!'); location.href = '../sign.php'; </script>";
            }

            break;
        }

        case "verificar": {
            $ids = Crud::getAllIds();

            foreach($ids as $id) {
                $obj = $crud->read($id);

                if ($obj->getNome() == $nome && password_verify($_POST['senha'], $obj->getSenha())) {
                    if (!isset($_SESSION)) {
                        session_start();
                    }

                    $_SESSION['nome'] = $obj->getNome();
                    $_SESSION['email'] = $obj->getEmail();
                    $_SESSION['id'] = $obj->getId();

                    echo "<script> alert('Bem vindo {$obj->getNome()}!'); location.href = '../mostrar.php'; </script>";

                    return;
                }
            }

            echo "<script> alert('Usuário ou senha inválidos!'); location.href = '../login.php'; </script>";

            break;
        }

        case "excluir": {
            if (isset($_POST['return'])) {
                $return = "logout";
            }

            else {
                $return = "listar";
            }

            if ($crud->delete($id)) {
                echo "<script>
                        alert('Usuário excluído com sucesso!');

                        let retornar = '$return';

                        if (retornar == 'logout') {
                            location.href = 'logout.php';
                        }

                        else {
                            location.href = '../listar.php';
                        }
                    </script>";
            }

            else {
                echo "<script>
                    alert('Ocorreu um erro ao tentar excluir o usuário!');

                        if (".$return." == 'logout') {
                            location.href = 'logout.php';
                        }

                        else {
                            location.href = '../listar.php';
                        }
                    </script>";
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

                echo "<script> alert('Dados atualizados com sucesso!'); location.href = '../mostrar.php'; </script>";
            }

            else {
                echo "<script> alert('Ocorreu um erro ao tentar atualizar os dados do usuário!'); location.href = '../mostrar.php'; </script>";
            }

            break;
        }

        default: {
            header("location: ../");
        }
    }

?>