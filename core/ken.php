<?php
namespace core;
class ken{
	public static $classMap=array();
	public $assign=array();
	static public function run(){
		$route= new \core\lib\route();//路由类
		$config=\core\lib\conf::get('CTRL','route');//配置类
		
		$ctrl=$route->ctrl;
		$action=$route->action;
		$ctrlFile=APP.'/controller/'.$ctrl.'.php';
		if(is_file($ctrlFile)){
			include $ctrlFile;
			
			$controller='\\'.MODULE.'\\controller\\'.$ctrl;
			$obj=new $controller();
			$obj->$action();
		}else{
			throw new \Exception('未找到该文件'.$ctrlFile);
		}
	}
	static public function load($class){
		if(isset($classMap[$class])){
			return true;
			
		}else{
			$class=str_replace('\\','/',$class);
			$file=KENPHP.'/'.$class.'.php';
			if(is_file($file)){
				include  $file;
				self::$classMap[$class]=$class;
			}else{
				return false;
			}
		}
		
	}
	public function assign($name,$value){
		$this->assign[$name]=$value;
		
	}
	public function display($file){
		$file=APP.'/views/'.$file;
		if(is_file($file)){
			extract($this->assign);
			include $file;
			
		}else{
			throw new \Exception('未找到该文件'.$file);
		}
		
	}
}