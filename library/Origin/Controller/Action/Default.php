<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 02.10.11
 * Time: 23:35
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Controller_Action_Default extends Origin_Controller_Action_Abstract
{
    public function execute()
    {
        $app = Zend_Registry::get('app');

        $bootstrap  = $app->getBootstrap();

        $view = $bootstrap->getResource('view');

        $app->view = $bootstrap->getResource('view');

        $app->view->addScriptPath(APPLICATION_PATH . '/layouts/scripts/');
        $app->view->addScriptPath(APPLICATION_PATH . '/views/scripts/');
        $app->view->addHelperPath(LIBRARY_PATH . '/Origin/View/Helper', 'Origin_View_Helper_');

        echo $app->view->render('layout.phtml');
    }
}