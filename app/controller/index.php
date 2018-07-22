<?php
namespace app\controller;
class index  extends \core\ken {
	public function __construct(){
	}
	public function index(){
		/*model操作
		*$model=new \core\lib\model();
		*$rsql=('select * from users where 1');
		*$isql=("insert into users (title) values ('KenPHP')");
		*$model->exec($isql);
		*$res=$model->query($rsql);
		*/
		/*view操作*/
		$this->assign('v','KenPHP1.01');
		$this->assign('title','Hellow World!');
		$this->display('index.html');
	}
}