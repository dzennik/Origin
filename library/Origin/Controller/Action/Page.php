<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 11.12.11
 * Time: 10:35
 * To change this template use File | Settings | File Templates.
 */

class Origin_Controller_Action_Page extends Origin_Controller_Action_Abstract
{
    public function execute()
    {
        $app = Zend_Registry::get('app');
        $app->getBootstrap()->run();
    }
}