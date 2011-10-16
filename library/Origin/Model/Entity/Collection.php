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
    public function getChildren($documentKey, $document)
    {
        $children = array();

        foreach ($document as $key => $value) {
            if ($key === '_id') {
                continue;
            }

            if (is_object($value)) {
                continue;
            }

            if (is_array($value)) {
                $children[] = array(
                    'id'       => $documentKey . '.' . $key,
                    'text'     => $key,
                    'leaf'     => false,
                    'children' => $this->getChildren($documentKey . '.' . $key, $value)
                );
                continue;
            }

            $children[] = array(
                'id'       => $documentKey . '.' . $key,
                'text'     => $key,
                'leaf'     => true
            );
        }

        return $children;
    }

    public function getList()
    {
        $list = array();

        if ($this->_params['node'] === 'root') {
            $collections = Origin_Db::get()->listCollections();

            foreach ($collections as $collection) {
                $list[] = array(
                    'id'   => lcfirst($collection->getName()),
                    'text' => $collection->getName(),
                    'leaf' => false
                );
            }
        } else {
            $collection = $this->_params['node'];

            $collection = Origin_Db::get()->{$collection};

            $documents = $collection->find();

            foreach ($documents as $documentKey => $document) {
                $list[] = array(
                    'id'       => $documentKey,
                    'text'     => $documentKey,
                    'leaf'     => false,
                    'children' => $this->getChildren($documentKey, $document)
                );
            }
        }


        $response = new Origin_Controller_Response();
        $response->json($list);
    }
}