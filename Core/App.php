<?php
 namespace Core;
 class App{

    public static $container;
    public static  function setContainer($container)
    {
        static::$container = $container;

    }
    public static function container()
    {
       return  static::$container;
       
    }
    public static function resolve($key)
    {
       return  static::container()->resolve($key); 
    }
    public static function bind($key, $resolve)
    {
         static::container()->bind($key , $resolve); 
    } 
 }

