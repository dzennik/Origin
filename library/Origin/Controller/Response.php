<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 15.10.11
 * Time: 14:52
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Controller_Response extends Zend_Controller_Response_Http
{
    public function json($data)
    {
        $this->setBody(json_encode(Origin_Db::getArray($data)));

        $this->setHeader('Content-Type', 'application/json');

        $this->sendHeaders();
        $this->sendResponse();
    }
}