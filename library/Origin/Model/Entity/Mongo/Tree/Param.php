<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 13.11.11
 * Time: 11:21
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Model_Entity_Mongo_Tree_Param extends Origin_Model_Entity_Mongo_Tree_Abstract
{
    protected $_cls     = 'param';
    protected $_iconCls = 'param-hand';

    public function getItem()
    {
        return array(
            'id'       => $this->_id,
            'text'     => $this->_key,
            'value'    => $this->_value,
            'leaf'     => true,
            'cls'     => $this->_cls,
            'iconCls' => $this->_iconCls
        );
    }
}