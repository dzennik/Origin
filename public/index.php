<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('PROJECT_PATH')
    || define('PROJECT_PATH', realpath(dirname(__FILE__) . '/../'));

defined('PUBLIC_PROJECT_PATH')
    || define('PUBLIC_PROJECT_PATH', realpath(dirname(__FILE__) . '/'));

defined('LIBRARY_PATH')
    || define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/../library'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(
    implode(PATH_SEPARATOR, array(
        realpath(APPLICATION_PATH . '/../library'),
        get_include_path()
    ))
);


/** Zend_Application */
require_once 'Zend/Application.php';
require_once 'Origin/Application.php';

// Create application, bootstrap
$application = new Origin_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap()->run();

$m = new Mongo();

$db = $m->mediabook;
$book4 = $db->book->findOne(array('name' => '#4'));

$bookRef4 = MongoDBRef::create('books', $book4['_id']);


$db->book->update(array("name" => "#3"), array('$push' => array('refs' => $bookRef4)));

//$db->book->remove(array('_id' => new MongoId("4e6c805d86f1b5b3c7d60f1c")));