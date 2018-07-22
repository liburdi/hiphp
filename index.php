<?php
/**
* 入口文件
* 1.定义常量
* 2.加载函数库
* 3.启动框架
*/
define('KENPHP',realpath('./'));
define('CORE',KENPHP.'/core');
define('APP',KENPHP.'/app');
define('MODULE','app');

define('DEBUG',true);
if(DEBUG){
	ini_set('display_error','On');
}else{
	ini_set('display_error','Off');
}
include CORE.'/common/function.php';
include CORE.'/ken.php';
spl_autoload_register('\core\ken::load');
\core\ken::run();