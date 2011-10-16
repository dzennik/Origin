<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 16.10.11
 * Time: 12:41
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Helper_Abstract
{
    protected static $_instance = array();

    protected function __construct()
    {}

    public static function getInstance($name)
    {
        if (!isset(self::$_instance[$name])) {
            self::$_instance[$name] = new $name();
        }

        return self::$_instance[$name];
    }
}