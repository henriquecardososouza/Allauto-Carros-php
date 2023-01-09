<?php

    class Config {
        private static $user = "root";
        private static $password = "";
        private static $host = "localhost";
        private static $db = "allauto_carros";
        private static $dns;

        public function __construct() {
            self::$dns = 'mysql:host='.self::$host.';dbname='.self::$db.';';
        }

        public function getUser() {
            return self::$user;
        }

        public function getPassword() {
            return self::$password;
        }

        public function getHost() {
            return self::$host;
        }

        public function getDb() {
            return self::$db;
        }

        public function getDns() {
            return self::$dns;
        }
    }

?>