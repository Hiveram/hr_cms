<?php
namespace Hiveram;

class DB {
    private $host = '127.0.0.1';
    private $db   = 'hr_db';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';

    private $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 

    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    private $pdo;

    function __constructor() {
        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
             throw new PDOException($e->getMessage(), (int)$e->getCode());
        } 
    } 

    function query($sql, array $var){
        try{
            $stmt = $pdo->prepare($sql);
            $stmt->execute($var);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode);   
        } finally {
            return NULL;
        }
    }
}
?>
