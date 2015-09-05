<?php

use Faker\Factory;
use Singleton\Singleton;

class SingletonChild extends Singleton
{
    public function __construct()
    {
        $this->dummy = Factory::create()->text();
    }
}

class SingletonTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Factory
     */
    private $faker;

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->faker = Factory::create();
    }

    public function testGetInstance()
    {
        $instance = SingletonChild::getInstance();
        $this->assertEquals($instance, SingletonChild::getInstance());
    }

    public function testSetInstance()
    {
        $instance = SingletonChild::getInstance();
        $newInstance = new SingletonChild();
        SingletonChild::setInstance($newInstance);
        $this->assertEquals($newInstance, SingletonChild::getInstance());
    }
}
