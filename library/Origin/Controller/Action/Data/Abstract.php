<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 16.10.11
 * Time: 11:56
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Controller_Action_Data_Abstract extends Origin_Controller_Action_Abstract
{
    protected $_entity;

    public function execute()
    {
        if (!isset($this->_params['entity'])) {
            throw new Exception("Can't execute GET method with empty 'entity' parameter.");
        }

        if (!isset($this->_params['handler'])) {
            throw new Exception("Can't execute GET method with empty 'handler' parameter.");
        }

        $entityClassName = Origin_Helper_Name::getClass("Origin_Model_Entity_", $this->params['entity'], '-');

        $entityHandler = Origin_Helper_Name::getMethod($this->params['handler'], '-');

        unset($this->_params['entity']);
        unset($this->_params['handler']);

        $class = new $entityClassName($this->_params);

        $class->$entityHandler();
    }
}