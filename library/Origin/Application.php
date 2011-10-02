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
    protected $_view;

    /**
         *  @var Origin_Request_Request
         */
    protected $_request;
    protected $_dbConnection;

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

        $this->_dbConnection = Origin_Db::connection(); // connect to db

        $this->_request = new Origin_Controller_Request(); // request object

        Zend_Registry::set('app', $this);
    }

    public function __construct($environment, $options = null)
    {
        parent::__construct($environment, $options);

        $this->_init();
    }

    public function run()
    {
        $this->_request->execute();
    }
}