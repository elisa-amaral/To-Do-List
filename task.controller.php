<?php 

	require "task.model.php";
	require "task.service.php";
	require "connection.php";

	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	if($action == 'add') 
	{

		$task = new Task(); 

		$task->__set('task', $_POST['task']); 

		$connection = new Connection();

		$taskService = new TaskService($connection, $task); 

		$taskService->add(); 

		header('location: new-task.php?include=1');

	} 
	else if($action == 'getTasks') 
	{

		$task = new Task();  

		$connection = new Connection(); 

		$taskService  = new TaskService($connection, $task);
		
		$tasks = $taskService->getTasks(); 
	} 
	else if($action == 'update') 
	{

		$task = new Task();

		$task->__set('id', $_POST['id'])
			->__set('task', $_POST['task']); 

		$connection = new Connection(); 
		
		$taskService = new TaskService($connection, $task); 

		if ($taskService->update())
		{ 

			if( isset($_GET['page']) && $_GET['page']  == 'index') 
			{
				header('location: index.php'); 
			} 
			else 
			{
					header('location: all-tasks.php'); 
			}

		
		}
	} 
	else if($action == 'remove')
	{

		$task = new Task();

		$task->__set('id', $_GET['id']);

		$connection = new Connection();

		$taskService = new TaskService($connection, $task);
			
		if ($taskService->remove())
		{
			if( isset($_GET['page']) && $_GET['page']  == 'index') 
			{
				header('location: index.php'); 
			} 
			else 
			{
				header('location: all-tasks.php'); 
			}
		} 
	} 
	else if($action == 'markAsDone') 
	{

		$task = new Task();
		$task->__set('id', $_GET['id'])->__set('status_id',2); 

		$connection = new Connection();

		$taskService = new TaskService($connection, $task);
		
		if($taskService->markAsDone())
		{

			if( isset($_GET['page']) && $_GET['page']  == 'index') 
			{
				header('location: index.php'); 
			}
			else 
			{
				header('location: all-tasks.php'); 
			}
		}

	} 
	else if($action == 'getPendingTasks') 
	{
		$task = new Task(); 
		$task->__set('status_id', 1); 
		$connection = new Connection();
		$taskService  = new TaskService($connection, $task);

		$tasks = $taskService->getPendingTasks(); 
	}
	

?>