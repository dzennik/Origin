<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 11.12.11
 * Time: 10:33
 * To change this template use File | Settings | File Templates.
 */

class Origin_Controller_Access_Page extends Origin_Controller_Access_Abstract
{
    public function check()
    {
        return new Origin_Result(array('isAllow' => true));
    }
}