<?php
/**
调用方法:
php sh.php "/test/test1" "op=23&ui=opp"

注意: 由于等录的时候不能进行登录操作, 所以需要在 hooks/acl.php 里面 设置要访问的 controller 不需要进行登录

 **/
//@session_start();
@session_start();
if(!defined('SESSION_START_STATUS')){
    define('SESSION_START_STATUS','1');
}
set_time_limit(0);
ini_set("display_errors","On");
error_reporting(E_ALL);
$_SERVER['VIA'] = "shell";
$_SERVER['PATH_INFO'] = "";
if(isset($_SERVER['argv'][1])){
    $_SERVER['PATH_INFO'] = trim($_SERVER['argv'][1]);
}


$_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'];


echo "start ".date("Y-m-d H:i:s", time())."\t";
echo $_SERVER['REQUEST_URI']."\tcontents:\n";
$appPath = realpath(dirname(__FILE__));
include($appPath."/index.php");
echo "\nend ".date("Y-m-d H:i:s", time());


