<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 13.11.11
 * Time: 11:25
 * To change this template use File | Settings | File Templates.
 */
 
abstract class Origin_Model_Entity_Mongo_Tree_Abstract extends Origin_Model_Entity_Mongo_Abstract
{
    protected $_id;
    protected $_key;
    protected $_value;
    protected $_level;
    protected $_type;

    public abstract function getItem();

    public function __construct($data)
    {
        $this->setData($data);
    }
}