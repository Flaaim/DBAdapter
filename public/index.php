<?php

require_once "../vendor/autoload.php";

use App\DBFactory;
use App\Adapter\Config;


$config = new Config;

$db = DBFactory::connect($config);

$cat = $db->fetch("SELECT * FROM categories");