<?php

namespace App\Adapter;

use App\Adapter\AdapterInterface;
use App\Adapter\Config;

class Pdo implements AdapterInterface
{
    protected $dbh;

    const OPTIONS = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];

    public function connect($config)
    {
        try{
            $dsn = sprintf("mysql:host=%s;dbname=%s", $config->host, $config->db);
            
            $this->dbh = new \PDO($dsn, $config->user, $config->password);
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function fetch($sql)
    {
        try{
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $e){
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}