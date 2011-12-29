<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 16.10.11
 * Time: 11:25
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Model_Entity_Collection extends Origin_Model_Type_Tree
{
    protected $_treeItems = array();

    protected function _getIconCls($id)
    {
        $iconCls = 'hierarchy';

        if (is_numeric($id)) {
            $cls = 'item';
            $iconCls = 'text-list-numbers';
        }

        return $iconCls;
    }

    protected function _listItem($id, $key, $value, $level, $type)
    {
        if (!isset($this->_treeItems[$type])) {
            $className = 'Origin_Model_Entity_Mongo_Tree_' . ucfirst($type);
            $this->_treeItems[$type] = new $className(array());
        }

        $this->_treeItems[$type]->setData(array(
            'id'     => $id,
            'key'    => $key,
            'value'  => $value,
            'level'  => $level,
            'type'   => $type
        ));

        $item = $this->_treeItems[$type]->getItem();

        if (!$item['leaf']) {
            if ($value instanceof MongoCollection) {
                /**
                             * @var $value MongoCollection
                             */
                $value = $value->find(array());
            }

            $item['children'] = $this->_getChildren($id, $value, $item['level']);
        }

        return $item;
    }

    public function getList()
    {
        $list = array();

        if ($this->_params['node'] === 'root') {
            $collections = Origin_Db::get()->listCollections();

            foreach ($collections as $key => $collection) {
                $list[] = $this->_listItem(lcfirst($collection->getName()), $key, $collection, 1, 'collection');
            }
        } else {
            $collection = $this->_params['node'];

            $collection = Origin_Db::get()->{$collection};

            $documents = $collection->find();

            foreach ($documents as $documentKey => $document) {
                $id = lcfirst($collection->getName()) . '.' . $documentKey;

                $list[] = $this->_listItem($id, $documentKey, $document, 2, 'document');
            }
        }


        $this->_result($list);
    }
}