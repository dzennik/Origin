<?php

class Origin_Model_Entity extends Origin_Model_Abstract
{
    protected $_params;

    public function __construct($params)
    {
        $this->_params = $params;
    }
}

