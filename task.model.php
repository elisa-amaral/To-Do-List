<?php 

class Task 
{
	private $id;
	private $status_id;
	private $task;
	private $date_time;

	public function __get($attribute) 
	{
		return $this->$attribute;
	}

	public function __set($attribute, $value) 
	{
		$this->$attribute = $value;
		return $this; 
	} 
}

?>