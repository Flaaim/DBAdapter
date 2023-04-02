<?php

namespace App\Adapter;

use App\Adapter\AdapterInterface;
use App\Adapter\Config;

class Mysqli implements AdapterInterface
{
    protected $dbh;

    public function connect(Config $config)
    {
        try{
            $this->dbh = new \mysqli($config->host, $config->user, $config->password, $config->db);
        } catch(\Exception $e){
            throw new \Exception($e->getMessage(), (int)$e->getCode());
        }
        
         
    }

    public function fetch($sql)
    {
        $result = $this->dbh->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
}