<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 29.09.11
 * Time: 0:05
 * To change this template use File | Settings | File Templates.
 */
 
abstract class Origin_Controller_Access_Abstract extends Origin_Property
{
    protected $_params;

    public abstract function check();

    public function __construct($_params)
    {
        $this->_params = $this->_params;
    }
}