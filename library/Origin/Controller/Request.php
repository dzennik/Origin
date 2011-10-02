<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 28.09.11
 * Time: 23:30
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Controller_Request extends Zend_Controller_Request_Http
{
    public function execute()
    {
        $params = $this->getParams();

        $params['action'] = isset($params['action']) ? $params['action'] : 'default'; // default action

        $action = new Origin_Controller_Action($params['action']);

        if (isset($params['data'])) {
            $action->prepare($params['data']);
        }

        $action->execute();
    }
}