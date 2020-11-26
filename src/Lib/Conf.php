<?php

namespace src\Lib;

use src\Common\Exceptions\InvalidConfigException;

class Conf
{
    public static $conf = array();

    static public function get($name, $file)
    {
        /**
         *1.判断配置文件是否存在
         *2.判断配置是否存在
         *3.缓存设置
         */
        $file = __DIR__.'/../Config/' . $file . '.php';
        if (is_file($file)) {
            $conf = include $file;
            if (isset($conf[$name])) {
                self::$conf[$name] = $conf[$name];
                return $conf[$name];

            } else {
                throw new InvalidConfigException('Config not Found ');
            }

        } else {
            throw new InvalidConfigException("Config's file not Found " . $file);

        }
    }
}