<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 22:24
 * To change this template use File | Settings | File Templates.
 */

class Origin_View_Helper_BaseUrl
{
    protected $_baseUrl;

    function __construct()
    {
        $request = new Zend_Controller_Request_Http();

        $this->_baseUrl = $request->getScheme() . '://' . $request->getHttpHost() . '/';
    }

    function baseUrl()
    {
        return $this->_baseUrl;
    }
}