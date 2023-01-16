<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["nome"])) {
        header("location: ../");
    }

    error_reporting(E_ERROR | E_PARSE);
    include_once("../interfaces/iCrud.php");
    include_once("../classes/Config.php");
    include_once("../classes/Connection.php");
    include_once("../classes/Veiculo.php");
    include_once("../classes/Crud.php");

    $crud = new Crud("veiculos");
    $acao = $_POST["acao"];

    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];
    $preco = $_POST["preco"];
    $id = $_POST["id"];

    $img_slider = $_FILES['imageSlider'];
    $img_page_veiculo = $_FILES['imagePageVeiculo'];

    switch($acao) {
        case "cadastrar": {
            if ($img_slider["error"] || $img_page_veiculo["error"]) {
                print "<script> alert('Erro ao enviar as imagens'); location.href = 'cadastrar.php'; </script>";
                break;
            }

            if (strtolower(pathinfo($img_slider["name"], PATHINFO_EXTENSION)) != "webp" || strtolower(pathinfo($img_page_veiculo["name"], PATHINFO_EXTENSION)) != "webp") {
                print "<script> alert('As imagens não estão no formato \".webp\"'); location.href = 'cadastrar.php'; </script>";
                break;
            }

            if ($img_slider["size"] > 2097152 || $img_page_veiculo["size"] > 2097152) {
                print "<script> alert('Os arquivos são muito grandes'); location.href = 'cadastrar.php'; </script>";
                break;
            }

            $path_slider = "img/products/" . $crud->getMaxId() + 1 . "/slider.webp";
            $path_veiculo = "img/products/" . $crud->getMaxId() + 1 . "/page_veiculo.webp";

            $params = [$modelo, $marca, $preco, $path_slider, $path_veiculo];
            $obj = new Veiculo($params);

            if ($crud->create($obj)) {
                mkdir("../img/products/". $crud->getMaxId() ."/", 0777, true);
                move_uploaded_file($img_slider["tmp_name"], "../" . $path_slider);
                move_uploaded_file($img_page_veiculo["tmp_name"], "../" . $path_veiculo);

                print "<script> alert('Cadastro concluído com sucesso'); location.href = 'administrar.php'; </script>";
                break;
            }

            else {
                print "<script> alert('Falha ao realizar o cadastro'); location.href = 'administrar.php'; </script>";
                break;
            }
        }

        case "excluir": {
            $obj = $crud->read($id, "veiculo");
            
            if ($crud->delete($id)) {
                $path = "../" . $obj->getImgSlider();
                $path = str_replace("/slider.webp", "", $path);

                delTree($path);

                print "<script> alert('Deletado com sucesso'); location.href = 'administrar.php'; </script>";
            }

            break;
        }

        case "editar": {
            if ($img_slider["error"] || $img_page_veiculo["error"]) {
                print "<script> alert('Erro ao enviar as imagens'); location.href = 'cadastrar.php'; </script>";
                break;
            }

            if (strtolower(pathinfo($img_slider["name"], PATHINFO_EXTENSION)) != "webp" || strtolower(pathinfo($img_page_veiculo["name"], PATHINFO_EXTENSION)) != "webp") {
                print "<script> alert('As imagens não estão no formato \".webp\"'); location.href = 'cadastrar.php'; </script>";
                break;
            }

            if ($img_slider["size"] > 2097152 || $img_page_veiculo["size"] > 2097152) {
                print "<script> alert('Os arquivos são muito grandes'); location.href = 'cadastrar.php'; </script>";
                break;
            }

            $path_slider = "img/products/" . $id . "/slider.webp";
            $path_veiculo = "img/products/" . $id . "/page_veiculo.webp";

            $params = [$modelo, $marca, $preco, $path_slider, $path_veiculo];
            $obj = new Veiculo($params);
            $obj->setId($id);

            if ($crud->update($obj)) {
                move_uploaded_file($img_slider["tmp_name"], "../" . $path_slider);
                move_uploaded_file($img_page_veiculo["tmp_name"], "../" . $path_veiculo);

                print "<script> alert('Atualizado com sucesso'); location.href = 'administrar.php'; </script>";
            }

            else {
                print "<script> alert('Falha ao atualizar'); location.href = 'administrar.php'; </script>";
            }

            break;
        }
    }

    function delTree($dir) { 
        $files = array_diff(scandir($dir), array('.','..')); 

        foreach ($files as $file) { 
          (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        } 

        return rmdir($dir); 
    }
  
?>