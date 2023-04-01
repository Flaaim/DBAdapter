<?php

require_once "../vendor/autoload.php";

use App\DBFactory;
use App\Config;


$config = new Config;

$db = DBFactory::connect($config);

$cat = $db->fetch("SELECT * FROM categories");

var_dump($cat);