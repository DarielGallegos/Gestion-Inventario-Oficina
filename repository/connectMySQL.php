<?php
    class connectMySQL{
        private $db = 'gestion_oficina';
        private $user = 'devInventarioOficina';
        private $passwd = 'devInventario9118';
        private $hostname = 'localhost';
        public static $instance;

        public function __construct(){}

        public static function getInstance(){
            if(!isset(self::$instance)){
                self::$instance = new static();
            }
            return self::$instance;
        }

        public function createConnection(){
            try{
                $conn = new PDO("mysql:host=$this->hostname;dbname=$this->db", $this->user, $this->passwd);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            }catch(PDOException $e){
                echo "Connection Failed: ". $e->getMessage();
            }
        }

        public function closeConnection(PDO $conn){
            return $conn = null;
        }
    }
?>