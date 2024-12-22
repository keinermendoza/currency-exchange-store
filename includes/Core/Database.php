<?php

namespace Core;
use PDO;

class Database {
    protected $conection;
    protected $statement;


    public function __construct(array $config, string $username = "root", string $password = "") {

        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->conection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []) {
        $this->statement = $this->conection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function fetchAll() {
        return $this->statement->fetchAll();
    }

    public function fetchOr404() {
        $result =  $this->statement->fetch();
        if (!$result) notFound();
        else return $result; 
    }

    public function fetch() {
        return $this->statement->fetch();
    }

    public function lastId() {
        return $this->conection->lastInsertId();
    }
}