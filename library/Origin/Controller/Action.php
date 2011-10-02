<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 28.09.11
 * Time: 23:41
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Controller_Action extends Origin_Property
{
    protected $_params;
    protected $_action;

    public function prepare($params)
    {
        $this->_params = $params;
    }

    public function execute()
    {
        $path = explode('->', $this->_action);

        try {
            foreach ($path as $key => $value) {
                $path[$key] = ucfirst($value);
            }

            $className = implode('_', $path);

            $accessClassName = 'Origin_Controller_Access_' . $className;

            $actionClassName = 'Origin_Controller_Action_' . $className;

            $accessClass = new $accessClassName($this->_params);

            $resultAccess = $accessClass->check();

            if (!$resultAccess->isAllow()) {
                return $resultAccess->getMessages();
            }

            $class = new $actionClassName($this->_params);

            $class->execute();

        } catch (Exception $e) {
            throw new Exception('Invalid action for execution. Action Name: ' . $action);
        }
    }

    public function __construct($action)
    {
        $this->_action = $action;
    }
}