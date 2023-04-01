<?php

namespace App\Adapter;

use App\Adapter\AdapterInterface;
use App\Config;

class Pdo implements AdapterInterface
{
    protected $dbh;

    const OPTIONS = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];

    public function connect($config)
    {
        try{
            $this->dbh = new \PDO("mysql:host=".$config::HOST.";dbname=".$config::DB, $config::USER, $config::PASSWORD, self::OPTIONS);
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