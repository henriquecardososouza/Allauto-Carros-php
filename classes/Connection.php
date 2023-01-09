<?php

    require_once("Config.php");

    class Connection {
        private static $pdoInstance;
        private static $config;

        private function __construct() { }

        private function __clone() { }

        private function __wakeup() { }

        public static function getPdoInstance() {
            if (!isset(self::$config)) {
                self::$config = new Config();
            }

            if (!isset(self::$pdoInstance)) {
                try {
                    self::$pdoInstance = new PDO(self::$config->getDns(), self::$config->getUser(), self::$config->getPassword());
                    self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                
                
                catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
                        
            return self::$pdoInstance;
        }
    }

?>