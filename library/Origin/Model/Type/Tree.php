<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 02.10.11
 * Time: 23:05
 * To change this template use File | Settings | File Templates.
 */
 
abstract class Origin_Model_Type_Tree extends Origin_Model_Entity
{
    protected function _result($res)
    {
        $response = new Origin_Controller_Response();
        $response->json($res);
    }

    protected function _getChildren($documentKey, $document, $level)
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
                $children[] = $this->_listItem($documentKey . '.' . $key, $key, $value, $level + 1, 'array');
                continue;
            }

            $children[] = $this->_listItem($documentKey . '.' . $key, $key, $value, $level + 1, 'param');

            /*$children[] = array(
                'id'       => $documentKey . '.' . $key,
                'text'     => $key,
                'value'    => $value,
                'leaf'     => true,
                'cls'     => 'param',
                'iconCls' => 'param-hand'
            );*/
        }

        return $children;
    }

    protected abstract function _listItem($id, $key, $value, $level, $type);
    protected abstract function _getIconCls($id);
}