<?php
namespace src\Lib;
class Model extends \PDO{
	public function __construct(){
		$dsn='mysql:host=localhost;dbname=test';
		$username='root';
		$passwd='root';
		try{
			parent::__construct($dsn,$username,$passwd,$options);
		}catch(\PDOException $e){
			p($e->getMessage());
		}
	}
}