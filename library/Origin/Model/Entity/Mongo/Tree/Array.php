<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 13.11.11
 * Time: 11:21
 * To change this template use File | Settings | File Templates.
 */
 

class Origin_Model_Entity_Mongo_Tree_Array extends Origin_Model_Entity_Mongo_Tree_Abstract
{
    protected $_cls     = 'array';
    protected $_iconCls = 'hierarchy';

    public function getItem()
    {
        $this->_cls     = 'array';
        $this->_iconCls = 'hierarchy';
        if (is_numeric($this->_id)) {
            $this->_cls     = 'item';
            $this->_iconCls = 'text-list-numbers';
        }

        return array(
            'id'       => $this->_id,
            'text'     => $this->_key,
            'leaf'     => false,
            'level'    => $this->_level + 1,
            'cls'      => $this->_cls,
            'iconCls'  => $this->_iconCls
        );
    }
}