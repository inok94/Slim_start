<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.11.2016
 * Time: 0:28
 */
namespace App\Controllers;

Class Controller 
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        // TODO: Implement __get() method.
        if ($this->container->{$property})
        {
            return $this->container->{$property};
        }
    }
}