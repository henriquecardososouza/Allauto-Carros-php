<?php

    class Crud implements iCrud {
        private static $tabela;
        private static $pdo;
        private static $fields;

        public function __construct(String $tabela) {
            self::$pdo = Connection::getPdoInstance();
            self::$tabela = $tabela;

            $this->getFields();
        }

        public function create($object) {
            $sql = $this->createSqlQuery("create", $object);
            $id = self::getNewId();

            try {
                if ($object->getId() == null) {
                    $object->setId($id);
                }

                if (!self::$pdo->exec($sql)) {
                    throw new Exception("Ocorreu um erro ao tentar cadastrar o usuário");
                }

                return true;
            }

            catch (Exception $e) {
                echo $e->getMessage();
            }

            return false;
        }

        public function read(int $id, $tipo) {
            $sql = $this->createSqlQuery("read", $id);

            try {
                $res = self::$pdo->query($sql);

                if ($res) {
                    $row = $res->fetchAll();

                    if (count($row) == 0) {
                        throw new Exception("Erro ao realizar a consulta");
                    }

                    $obj_params = [];

                    for ($i = 1; $i < count($row[0]); $i++) {
                        $obj_params[] = $row[0][self::$fields[$i]];
                    }

                    switch ($tipo) {
                        case "usuario": {
                            $obj = new Usuario($obj_params);
                            break;
                        }

                        case "veiculo": {
                            $obj = new Veiculo($obj_params);
                            break;
                        }
                    }

                    $obj->setId($id);

                    return $obj;
                }

                else {
                    throw new Exception("Ocorreu um erro ao tentar se conectar ao banco de dados!");
                }
            }

            catch (Exception $e) {
                echo $e->getMessage();
            }

            return null;
        }

        public function update($object) {
            $sql = $this->createSqlQuery("update", $object);
            echo "<script> alert('$sql'); </script>";

            try {
                if (!self::$pdo->exec($sql)) {
                    throw new Exception("Ocorreu um erro ao tentar se conectar ao banco de dados!");
                }

                return true;
            }

            catch (Exception $e) {
                echo $e->getMessage();
            }

            return false;
        }

        public function delete(int $id) {
            $sql = $this->createSqlQuery("delete", $id);

            try {
                if(!self::$pdo->query($sql)) {
                    throw new PDOException("Ocorreu um erro ao tentar se conectar ao banco de dados!");
                }

                return true;
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }

            return false;
        }

        private static function getNewId() {
            $tabela = self::$tabela;

            $sql = "SELECT MAX(id) AS id FROM $tabela";

            try {
                $statement = self::$pdo->prepare($sql);

                if ($statement->execute()) {
                    if ($statement->rowCount() > 0) {
                        return (int) $statement->fetchObject()->id + 1;
                    }
                    
                    else {
                        throw new Exception("Ocorreu um erro ao se conectar com o banco de dados!");
                    }
                }

                else {
                    throw new Exception("Ocorreu um erro ao se conectar com o banco de dados!");
                }
            }

            catch (Exception $e) {
                echo $e->getMessage();
            }
                
            exit();
        }

        public static function getAllIds() {
            $table = self::$tabela;

            $sql = "SELECT * FROM $table";

            try {
                $statement = self::$pdo->prepare($sql);

                if ($statement->execute()) {
                    if ($statement->rowCount() == 0) {
                        throw new PDOException("Ocorreu um erro ao tentar se conctar ao banco de dados!");
                    }

                    $ids = [];

                    while ($row = $statement->fetchObject()) {
                        $ids[] = $row->id;
                    }

                    return $ids;
                }

                else {
                    throw new PDOException("Ocorreu um erro ao tentar se conctar ao banco de dados!");
                }
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }

            return null;
        }

        public function getRandomFields() {
            $tabela = self::$tabela;

            $sql = "SELECT * FROM $tabela ORDER BY RAND()";

            try {
                $statement = self::$pdo->prepare($sql);

                if ($statement->execute()) {
                    if ($statement->rowCount() > 0) {
                        $ids = [];

                        while($row = $statement->fetchObject()) {
                            $ids[] = $row->id;
                        }

                        return $ids;
                    }

                    else {
                        throw new PDOException("Nenhum dado encontrado");
                    }
                }

                else {
                    throw new PDOException("Erro ao realizar a consulta");
                }
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }

            return null;
        }

        public function getMaxId() { 
            $tabela = self::$tabela;

            $sql = "SELECT MAX(id) AS id FROM $tabela";

            try {
                $statement = self::$pdo->prepare($sql);

                if ($statement->execute()) {
                    if ($statement->rowCount() > 0) {
                        return (int) $statement->fetchObject()->id;
                    }

                    else {
                        throw new Exception("Erro ao adquirir o id");
                    }
                }

                else {
                    throw new Exception("Erro ao adquirir o id");
                }
            }
            
            catch(Exception $e) {
                echo $e->getMessage();
            }

            return null;
        }

        private function getFields() {
            $tabela = self::$tabela;

            $sql = "SHOW columns FROM $tabela";

            $statement = self::$pdo->prepare($sql);
            
            if ($statement->execute()) {
                while ($row = $statement->fetchObject()) {
                    self::$fields[] = $row->Field;
                }
            }

            else {
                die("Erro ao obter os campos da tabela!");
            }
        }

        private function createSqlQuery($method, $aux) {
            $statement = "";
            $tabela = self::$tabela;

            switch ($method) {
                case "create": {
                    $statement .= "INSERT INTO $tabela (";

                    for ($i = 0; $i < count(self::$fields); $i++) {
                        $statement .= self::$fields[$i];

                        if ($i < count(self::$fields) - 1) {
                            $statement .= ", ";
                        }
                    }

                    $statement .= ") VALUES (".self::getNewId().", ";

                    $atributes = $aux->getAllAtributes();

                    for ($i = 1; $i < count(self::$fields); $i++) {
                        $statement .= self::$pdo->quote($atributes[$i]);

                        if ($i < count(self::$fields) - 1) {
                            $statement .= ", ";
                        }
                    }

                    $statement .= ")";

                    break;
                }

                case "read": {
                    $statement .= "SELECT * FROM $tabela WHERE id=$aux";
                    break;
                }

                case "update": {
                    $statement .= "UPDATE $tabela SET ";//nome=:nome, email=:email, senha=:senha WHERE id=:id"
                    $atributes = $aux->getAllAtributes();

                    for ($i = 1; $i < count($atributes); $i++) {
                        $statement .= self::$fields[$i]."=".self::$pdo->quote($atributes[$i]);

                        if ($i < count($atributes) - 1) {
                            $statement .= ", ";
                        }
                    }

                    $statement .= " WHERE id=".$atributes[0];

                    break;
                }

                case "delete": {
                    $statement .= "DELETE FROM $tabela WHERE id=$aux";

                    break;
                }
            }

            return $statement;
        }
    }

?>