<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body

        //$entity = new Origin_Property();
        $origin = new Model_Origin_Entity();

        //var_dump(Zend_Registry::get('config')->origin->project);
        //exit;
    }


}

