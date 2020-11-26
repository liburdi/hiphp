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
    public static function run()
    {
        $route = new Lib\Route();//路由类
//		$Config=Lib\Conf::get('CTRL','route');//配置类

        $ctrl = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APPPATH . '/Controllers/' . $ctrl . '.php';
        if (is_file($ctrlFile)) {

            include $ctrlFile;

            $controller = '\\' . MODULE . '\\Controllers\\' . $ctrl;
            $obj = new $controller();
            $obj->$action();
        } else {
            $ctrlFile = APPPATH . '/Crons/' . $ctrl . '.php';
            if (is_file($ctrlFile)) {

                include $ctrlFile;

                $controller = '\\' . MODULE . '\\Crons\\' . $ctrl;
                $obj = new $controller();
                $obj->$action();
            }else {
                throw new InvalidRouteException('File not found ' . $ctrlFile);
            }
        }
    }

    /**
     * spl_autoload_register function
     * @param $class
     * @return bool
     * @throws InvalidRouteException
     */
    public static function load($class)
    {
        if (isset($classMap[$class])) {
            return true;

        } else {
            $class = str_replace('\\', '/', $class);
            $file =   '/' . $class . '.php';
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
        $file = APPPATH . '/views/' . $file;
        if (is_file($file)) {
            extract($this->assign);
            include $file;

        } else {
            throw new InvalidRouteException('File not found ' . $file);
        }

    }
}