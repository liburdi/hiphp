<?php

namespace src;

use src\Common\Exceptions\InvalidRouteException;

class Run
{
    public static $classMap = array();
    public $assign = array();

    /**
     * the entrance
     * @throws InvalidRouteException
     */
    static public function run()
    {
        $route = new lib\Route();//路由类
//		$Config=Lib\Conf::get('CTRL','route');//配置类

        $ctrl = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP . '/controller/' . $ctrl . '.php';
        if (is_file($ctrlFile)) {
            include $ctrlFile;

            $controller = '\\' . MODULE . '\\controller\\' . $ctrl;
            $obj = new $controller();
            $obj->$action();
        } else {
            spl_autoload_register('src\Run::load');
            throw new InvalidRouteException('File not found ' . $ctrlFile);
        }
    }

    /**
     * spl_autoload_register function
     * @param $class
     * @return bool
     * @throws InvalidRouteException
     */
    static public function load($class)
    {
        if (isset($classMap[$class])) {
            return true;

        } else {
            $class = str_replace('\\', '/', $class);
            $file = APPDIR . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
                return true;
            } else {
                throw new InvalidRouteException('File not found ' . $file);
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;

    }

    public function display($file)
    {
        $file = APPDIR . '/views/' . $file;
        if (is_file($file)) {
            extract($this->assign);
            include $file;

        } else {
            throw new InvalidRouteException('File not found ' . $file);
        }

    }
}