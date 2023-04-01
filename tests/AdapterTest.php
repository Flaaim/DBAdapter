<?php
declare(strict_types=1);
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Config;
use App\DBFactory;

class AdapterTest extends TestCase
{
    protected $config;

    public function setUp(): void
    {
        
        $this->config = new Config();
    }

    public function test_path_to_adapter()
    {
        
        $adapter = "Pdo";
        $path =  "App\\Adapter\\".$adapter;
        $class = new $path();
        //$this->assertEquals($path, DBFactory::connect($this->config));
        $this->assertInstanceOf($path, DBFactory::connect($this->config));
    }
}