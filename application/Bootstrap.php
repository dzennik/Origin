<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initAutoloader()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();

        $modelLoader = new Zend_Loader_Autoloader_Resource(array(
            'basePath'      => APPLICATION_PATH,
            'namespace'     => '',
            'resourceTypes' => array(
                'model' => array(
                    'namespace'     => 'Model',
                    'path'      => 'models/',
                )
            )
        ));

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
        $autoloader->pushAutoloader($modelLoader);
    }

    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions(), true);
        Zend_Registry::set('config', $config);
        return $config;
    }
}

