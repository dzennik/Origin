<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 16.10.11
 * Time: 11:59
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Helper_Name extends Origin_Helper_Abstract
{
    public function getParts($name, $delimiter)
    {
        $result = array();
        $nameParts = explode($delimiter, $name);

        foreach ($nameParts as $namePart) {
            $result []= ucfirst($namePart);
        }

        return $result;
    }

    public static function getClass($prefix, $name, $delimiter = '-')
    {
        $self = self::getInstance(__CLASS__);

        $parts = $self->getParts($name, $delimiter);

        return $prefix . implode('_', $parts);
    }

    public static function getMethod($name, $delimiter = '-')
    {
        $self = self::getInstance(__CLASS__);

        $parts = $self->getParts($name, $delimiter);

        if (count($parts) > 0) {
            $parts[0] = lcfirst($parts[0]);
        }

        return implode('', $parts);
    }
}