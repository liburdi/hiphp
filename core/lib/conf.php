<?php
namespace core\lib;
class conf{
	public static $conf=array();
	static public function get($name,$file){
		/*
		*1.判断配置文件是否存在
		*2.判断配置是否存在
		*3.缓存设置
		*/
		$file=KENPHP.'/core/config/'.$file.'.php';
		if(is_file($file)){
			$conf=include $file;
			if(isset($conf[$name])){
				self::$conf[$name]=$conf[$name];
				return $conf[$name];
				
			}else{
				throw new \Exception('没有这个配置项'.$name);
			}
			
		}else{
			throw new \Exception('找不到配置文件',$file);
			
		}
	}
}