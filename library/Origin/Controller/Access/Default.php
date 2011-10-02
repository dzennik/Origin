<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 02.10.11
 * Time: 23:44
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Controller_Access_Default extends Origin_Controller_Access_Abstract
{
    public function check()
    {
        return new Origin_Result(array('isAllow' => true));
    }
}