
<?php
class Database
{
	private $dbhost = "localhost";
	private $dbuser = "root";
	private $dbpass = "";
	private $dbname = "db_ngoms";

	public $pdo;

	public function __construct()
	{
		if (!isset($this->pdo)) {
			try {
				$dns = "mysql:host=".$this->dbhost.";dbname=".$this->dbname."";
				$link = new PDO($dns, $this->dbuser, $this->dbpass);
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$link->exec("SET CHARACTER SET utf8");
				$this->pdo = $link;
			} catch (Exception $e) {
				die("Faild to Connect with data base". $e->getMessage());
			}
		}
	}
}
