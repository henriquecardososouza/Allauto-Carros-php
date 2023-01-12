<?php

    include("../interfaces/iCrud.php");
    include("Usuario.php");
    include("Connection.php");

    class Crud implements iCrud {
        private static $tabela;
        private static $pdo;

        public function __construct(String $tabela) {
            self::$pdo = Connection::getPdoInstance();
            self::$tabela = $tabela;
        }

        public function create($object) {
            $tabela = self::$tabela;

            $sql = "INSERT INTO $tabela (id, nome, email, senha) VALUES (:id, :nome, :email, :senha)";
            $id = self::getNewId();

            try {
                $statement = self::$pdo->prepare($sql);

                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->bindValue(':nome', $object->getNome(), PDO::PARAM_STR);
                $statement->bindValue(':email', $object->getEmail(), PDO::PARAM_STR);
                $statement->bindValue(':senha', $object->getSenha(), PDO::PARAM_STR);


                if ($object->getId() == null) {
                    $object->setId($id);
                }

                if (!$statement->execute()) {
                    throw new PDOException("Ocorreu um erro ao tentar se conectar ao banco de dados!");
                }


                return true;
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }

            return false;
        }

        public function read(int $id) {
            $tabela = self::$tabela;

            $sql = "SELECT * FROM $tabela WHERE id=:id";

            try {
                $statement = self::$pdo->prepare($sql);
                $statement->bindParam("id", $id, PDO::PARAM_INT);

                if ($statement->execute()) {
                    $row = $statement->fetchObject();

                    $nome = $row->nome;
                    $email = $row->email;
                    $senha = $row->senha;

                    $obj = new Usuario($nome, $email, $senha);
                    $obj->setId($id);

                    return $obj;
                }
                
                else {
                    throw new PDOException("Ocorreu um erro ao tentar se conectar ao banco de dados!");
                }
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }

            return null;
        }

        public function update($object) {
            $tabela = self::$tabela;

            $sql = "UPDATE $tabela SET nome=:nome, email=:email, senha=:senha WHERE id=:id";

            try {
                $statement = self::$pdo->prepare($sql);

                $statement->bindValue("nome", $object->getNome(), PDO::PARAM_STR);
                $statement->bindValue("email", $object->getEmail(), PDO::PARAM_STR);
                $statement->bindValue("senha", $object->getSenha(), PDO::PARAM_STR);
                $statement->bindValue("id", $object->getId(), PDO::PARAM_INT);
                
                if (!$statement->execute()) {
                    throw new PDOException("Ocorreu um erro ao tentar se conectar ao banco de dados!");
                }

                return true;
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }

            return false;
        }

        public function delete(int $id) {
            $tabela = self::$tabela;

            $sql = "DELETE FROM $tabela WHERE id=:id";

            try {
                $statement = self::$pdo->prepare($sql);

                $statement->bindParam("id", $id, PDO::PARAM_INT);

                if(!$statement->execute()) {
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
    }

?>