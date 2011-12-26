<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 13.11.11
 * Time: 11:21
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Model_Entity_Mongo_Tree_Collection extends Origin_Model_Entity_Mongo_Tree_Abstract
{
    protected $_cls     = 'collection';
    protected $_iconCls = 'table-gear';

    public function getItem()
    {
        return array(
            'id'      => $this->_id,
            'cls'     => $this->_cls,
            'iconCls' => $this->_iconCls,
            'text'    => $this->_value->getName(),
            'leaf'    => false,
            'level'   => 1
        );
    }
}