<?php
class DAL {
    private $host = '127.0.0.1';
    private $db   = 'theschool.admin';    
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';
    private $dsn;
    private $pdo;
    private $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        function __construct() {
            $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);            
        }
       
        function executeStatement($query) {
            $stmt = $this->pdo->query($query);
            return $stmt;
        }


        function prepareStatement($query) {
           $stmt = $this->pdo->prepare($query);
            return $stmt;
        }

        function lastInsertId() {
            return $this->pdo->lastInsertId();
        }
}


?>