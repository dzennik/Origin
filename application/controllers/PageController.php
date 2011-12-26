<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 11.12.11
 * Time: 10:29
 * To change this template use File | Settings | File Templates.
 */

class PageController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->layout->setLayout('pages/inner');
    }

    public function indexAction()
    {
        $this->_helper->layout->setLayout('pages/home');
    }

    public function testAction()
    {

    }
}