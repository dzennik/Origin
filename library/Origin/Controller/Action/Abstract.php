<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 28.09.11
 * Time: 23:53
 * To change this template use File | Settings | File Templates.
 */
 
abstract class Origin_Controller_Action_Abstract extends Origin_Property
{
    protected $_params = array();

    public abstract function execute();

    public function __construct($params)
    {
        $this->_params = $params;
    }
}