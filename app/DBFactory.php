<?php

namespace App;

use App\Adapter\Config;

class DBFactory
{
    public static function connect(Config $config)
    {
        $className = "App\\Adapter\\".$config->driver;
        
        if(class_exists($className)){
            $adapter = new $className();
        }
        $adapter->connect($config);
        return $adapter;
    }
}