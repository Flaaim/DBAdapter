<?php

namespace App\Adapter;

use App\Config;

interface AdapterInterface
{
    public function connect(Config $config);
    public function fetch($sql);
}