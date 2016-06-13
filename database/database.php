<?php
define('host', 'localhost');
define('ddba', 'pdo');
define('user', 'root');
define('pass', '');

$pdo = array();
$pdo = array('hostname' => host,'dbname' => ddba,'user' => user,'pass' => pass);

class _db{
	public static function _connect(){
	global $pdo;	
		return new PDO('mysql:host='.$pdo['hostname'].';dbname='.$pdo['dbname'].';',$pdo['user'], $pdo['pass']);
	}
	public static function sql($a){
		if(_db::_response()){
			_db::mkLog($a);
			return $a;
		}
	}
	public static function _response(){
		global $pdo;$data = $pdo['dbname'];
		$r= _db::_connect()->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$data'");
		$return = (bool) $r->fetchColumn();
			if($return == 0){
				_db::mkLog('SERVER NO RESPONSE');
				return false;
			} elseif($return == 1){
				return true;
			}
	}
	public static function mkLog($data){
		ob_start();
		$mk_1 = var_dump($data);
		$mk_2 = var_dump(_db::_connect()->query($data)->fetch(PDO::FETCH_ASSOC));
		$output_1 = date('m/d/Y h:i:s a', time()).': '.ob_get_clean()."\n";
		$file = fopen('database/log/'.date('m-d-Y h-i-sa', time()).'.txt', "wb");
		fwrite($file, $output_1);
		fclose($file);
	}
}
class _readLog{
	public static function read(){
		$dir    = 'database/log/';
		header ('Location:'.$dir);
	}
}
?>