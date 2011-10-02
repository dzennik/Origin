<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 29.09.11
 * Time: 0:06
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Result extends Origin_Property
{
    public $_isAllow  = false;
    public $_messages = array();

    public function getMessages()
    {
        return $this->_messages;
    }

    public function isAllow()
    {
        return $this->_isAllow;
    }

    public function __construct($data)
    {
        $this->setData($data);
    }
}