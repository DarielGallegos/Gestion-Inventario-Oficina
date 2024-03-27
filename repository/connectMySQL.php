<?php
    class connectMySQL{
        private $db = 'u903638193_inventario';
        private $user = 'u903638193_grupo4';
        private $passwd = 'DDjky2H]';
        private $hostname = '62.72.50.154';
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