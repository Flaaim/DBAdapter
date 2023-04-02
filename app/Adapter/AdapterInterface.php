<?php

namespace App\Adapter;

use App\Adapter\Config;

interface AdapterInterface
{
    public function connect(Config $config);
    public function fetch($sql);
}