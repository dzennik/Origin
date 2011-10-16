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
    public function getUrlParams()
    {
        $result = array();

        $urlParams = explode('/', $this->getPathInfo());

        array_shift($urlParams);

        if (strlen($urlParams[0]) > 0) {
            $result['action'] = $urlParams[0];
        }

        array_shift($urlParams);

        $paramsCount = count($urlParams);

        for ($i = 0; $i < $paramsCount; $i += 2) {
            $key = $urlParams[$i];
            if (strlen($key) > 0) {
                if ($i + 1 <= $paramsCount - 1) {
                    $result[$key] = $urlParams[$i + 1];
                } else {
                    $result[$key] = '';
                }
            }
        }

        return $result;
    }

    public function execute()
    {
        $params = $this->getParams();

        $urlParams = $this->getUrlParams();

        $params = array_merge($urlParams, $params);

        $params['action'] = isset($params['action']) ? $params['action'] : 'default'; // default action

        $action = new Origin_Controller_Action($params['action']);

        unset($params['action']);

        if (isset($params)) {
            $action->prepare($params);
        }

        $action->execute();
    }
}