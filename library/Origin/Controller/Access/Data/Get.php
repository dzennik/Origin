<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 28.09.11
 * Time: 23:41
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Controller_Access_Data_Get extends Origin_Controller_Access_Abstract
{
    public function check()
    {
        return new Origin_Result(array('isAllow' => true));
    }
}