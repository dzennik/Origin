<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 02.10.11
 * Time: 23:11
 * To change this template use File | Settings | File Templates.
 */

class Origin_Db extends Origin_Property
{
    protected $_connection;
    protected static $_instance;

    public static function get($name = 'origin')
    {
        $connection = Origin_Db::connection();

        if (is_null($name)) {
            return null;
        }

        return $connection->{$name};
    }

    public static function connection()
    {
        return Origin_Db::getInstance()->connection;
    }

    public static function getInstance()
    {
        if (is_null(Origin_Db::$_instance)) {
            Origin_Db::$_instance = new self();
        }

        return Origin_Db::$_instance;
    }

    protected function __construct()
    {
        $this->_connection = new Mongo();
    }
}