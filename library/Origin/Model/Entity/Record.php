<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 12.11.11
 * Time: 21:18
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Model_Entity_Record extends Origin_Model_Type_Tree
{
    protected function _getIconCls($id)
    {
        $iconCls = 'hierarchy';

        if (is_numeric($id)) {
            $cls = 'item';
            $iconCls = 'text-list-numbers';
        }

        return $iconCls;
    }

    protected function _listItem($id, $item, $level)
    {
        $cls = 'item';
        if ($level === 1) {
            $cls = 'document';
            $id  = $id . '.' . $item->_id->getId();
            $name = $item->getName();
            $value = '';
        } else {
            $cls = 'param';
            $id  = $id . '.' . $item->_id->getId();
            $name = $item->getName();
            $value = '';
        }

        $result = array(
            'id'       => $id,
            'cls'      => $cls,
            'iconCls'  => $cls,
            'name'     => $name,
            'value'    => $value,
            'leaf'     => false,
            'children' => $this->_getChildren($id, $document, $level)
        );

        return $result;
    }

    public function getList()
    {
        $list = array();

        if (!isset($this->_params['node'])) {
            $this->_result($list);
            return;
        }

        $path = explode('.', $this->_params['node']);

        if (count($path) === 0) {
            $this->_result($list);
            return;
        }

        $collection = array_shift($path);

        $collection = Origin_Db::get()->{$collection};

        if (count($path) > 0) {
            $id = array_shift($path);

            $document = $collection->findOne(array('_id' => new MongoId($id)));

            $listId = lcfirst($collection->getName());

            $list[] = $this->_listItem($listId, $document, 1);
        } else {
            $documents = $collection->find();
        }

        var_dump($collection);
        exit;

        $list[] = array(
            'id'      => 'dsg2',
            'name'    => 'Some Field Name 1',
            'value'    => 'Some Field Value 1',
            'leaf'    => false
        );

        $list[] = array(
            'id'      => 'dsg3',
            'name'    => 'Some Field Name 2',
            'value'    => 'Some Field Value 2',
            'leaf'    => false
        );

        /*if ($this->_params['node'] === 'root') {
            $collections = Origin_Db::get()->listCollections();

            foreach ($collections as $collection) {
                $list[] = array(
                    'id'      => lcfirst($collection->getName()),
                    'cls'     => 'collection',
                    'iconCls' => 'table-gear',
                    'text'    => $collection->getName(),
                    'leaf'    => false
                );
            }
        } else {
            $collection = $this->_params['node'];

            $collection = Origin_Db::get()->{$collection};

            $documents = $collection->find();

            foreach ($documents as $documentKey => $document) {
                $list[] = array(
                    'id'       => $documentKey,
                    'cls'     => 'document',
                    'iconCls' => 'property',
                    'text'     => $documentKey,
                    'leaf'     => false,
                    'children' => $this->getChildren($documentKey, $document, 1)
                );
            }
        }*/


        $this->_result($list);
    }
}