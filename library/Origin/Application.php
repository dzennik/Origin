<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 13:24
 * To change this template use File | Settings | File Templates.
 */
 
class Origin_Application extends Zend_Application
{
    /**
         *  @var Zend_VIew
         */
    private $_view;

    private function _init()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();

        $originLoader = new Zend_Loader_Autoloader_Resource(array(
            'basePath'      => PROJECT_PATH,
            'namespace'     => '',
            'resourceTypes' => array(
                'model' => array(
                    'namespace' => 'Origin',
                    'path'      => 'library/Origin/',
                )
            )
        ));

        $autoloader->pushAutoloader($originLoader);
    }

    public function __construct($environment, $options = null)
    {
        parent::__construct($environment, $options);

        $this->_init();
    }

    public function run()
    {
        $bootstrap  = $this->getBootstrap();

        $view = $bootstrap->getResource('view');

        $this->_view = $bootstrap->getResource('view');

        $this->_view->addScriptPath(APPLICATION_PATH . '/layouts/scripts/');
        $this->_view->addScriptPath(APPLICATION_PATH . '/views/scripts/');
        $this->_view->addHelperPath(LIBRARY_PATH . '/Origin/View/Helper', 'Origin_View_Helper_');

        echo $this->_view->render('layout.phtml');
    }
}