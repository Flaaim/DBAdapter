<?php

namespace App;

use App\Config;

class DBFactory
{
    public static function connect(Config $config)
    {
        $className = "App\\Adapter\\".$config::DRIVER;
        
        if(class_exists($className)){
            $adapter = new $className();
        }
        $adapter->connect($config);
        return $adapter;
    }
}