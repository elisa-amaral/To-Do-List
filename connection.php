<?php  

class Connection
{

	private $host = 'mysql-to-dolist.alwaysdata.net';
	private $dbname = 'to-dolist_database';
	private $user = 'to-dolist';
	private $pass = 'Ux#9aKBr';

	public function connect() {
		try {
           
			$connection = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname", 
				"$this->user", 
				"$this->pass"
			) ;

			$connection->exec('set charset set utf8');
            
			return $connection;
			
		} catch(PDOException $e) {
			echo '<p>' .$e->getMessage(). '</p>';
		}

	}
}

?>