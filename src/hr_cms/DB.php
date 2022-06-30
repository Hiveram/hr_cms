<?php
namespace Hiveram;

use PDO;

class DB {
    private $host = '127.0.0.1';
    private $db   = 'hr_db';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';

    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    private $pdo;

    function __constructor() {
        try {
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset, $this->user, $this->pass, $this->options);
        } catch (PDOException $e) {
             throw new PDOException($e->getMessage(), (int)$e->getCode());
        } 
    } 

    function query($sql, array $var){
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($var);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode);
        }
    }
}
?>
