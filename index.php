<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
define('BASEPATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('APPPATH',str_replace('\\','/',realpath(__DIR__.'/App/')));
define('MODULE','App');
define('DEBUG',true);

if(DEBUG){
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/Common/function.php';
spl_autoload_register('load');
src\Run::run();


/**
 * spl_autoload_register function
 * @param $class
 * @return bool
 */
  function load($class)
{

        $class = str_replace('\\', '/', $class);

        $file =  BASEPATH . $class . '.php';
        if (is_file($file)) {
            include $file;
            return true;
        } else {
            return false;
        }

}