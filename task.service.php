<?php 

class TaskService 
{

    private $connection;
    private $task;

    public function __construct(Connection $connection, Task $task) 
    {

        $this->connection = $connection->connect(); 
   
        $this->task = $task; 
    }

 	public function add() 
    { 

       if (strpos($this->task->__get('task'), "'") !== false) 
       {
           $this->task->__set('task', str_replace("'", "`", $this->task->task));
       } 
       else if(strpos($this->task->__get('task'), '"') !== false) 
       {
           $this->task->__set('task', str_replace('"', '``', $this->task->task));
       }

       $query = 'insert into tasks(task)values(:task)';

       $statement = $this->connection->prepare($query);

       $statement->bindValue(':task', $this->task->__get('task'));
        
       $statement->execute();

 	}

 	public function getTasks() 
    { 
 		
        $query = '
                select 
                    t.id, s.status, t.task 
                from 
                    tasks as t
                    left join status as s on (t.status_id = s.id)
            ';


        $statement = $this->connection->prepare($query);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_OBJ); 
 	}

 	public function update() 
    { 

       if (strpos($this->task->__get('task'), "'") !== false) 
       {
           $this->task->__set('task', str_replace("'", "`", $this->task->task));
       } 
       else if(strpos($this->task->__get('task'), '"') !== false) 
       {
           $this->task->__set('task', str_replace('"', '``', $this->task->task));
       }
    
       $query = "update tasks set task = ? where id = ?"; 
       $statement = $this->connection->prepare($query);
       $statement->bindValue(1, $this->task->__get('task')); 
       $statement->bindValue(2, $this->task->__get('id'));

       return $statement->execute(); 
     
 	}
    
 	public function remove() 
    { 

 		$query = 'delete from tasks where id = :id';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $this->task->__get('id'));
        return $statement->execute();
 	}

    public function markAsDone()
    {

       $query = "update tasks set status_id = ? where id = ?"; 
       $statement = $this->connection->prepare($query);

       $statement->bindValue(1, $this->task->__get('status_id')); 
       $statement->bindValue(2, $this->task->__get('id')); 
       return $statement->execute(); 
    }

    public function getPendingTasks()
    {

        $query = '
                select 
                    t.id, s.status, t.task 
                from 
                    tasks as t
                    left join status as s on (t.status_id = s.id)
                where 
                     t.status_id = :status_id 
            ';
       
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':status_id', $this->task->__get('status_id')); 
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ); 
    }
 }

?>