<?php
echo "{{ server_name }}";
ini_set( 'default_charset', 'UTF-8' );
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Moscow');
require_once 'local_config.php';
// change the following paths if necessary
$yii = YII_PATH . '/yii.php';
$config=dirname(__FILE__).'/../protected/modules/frontend/config/frontend.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once $yii;
Yii::createWebApplication($config)->run();
