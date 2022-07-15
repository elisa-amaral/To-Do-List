<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>To-Do List</title>
		<link rel="icon" type="image/png" href="img/icon.png" sizes="25x25">

		<link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				    To-Do List
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Pending Tasks</a></li>
						<li class="list-group-item"><a href="all-tasks.php">All Tasks</a></li>
						<li class="list-group-item active"><a href="new-task.php">Add New Task</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container page">
						<div class="row">
							<div class="col">
								<h5>Add New Task</h5>
								<hr />

								<form method="post" action="task.controller.php?action=add">
									<div class="form-group">
										<label>Task Description:</label>
										<input type="text" class="form-control" name="task" placeholder="Example: Wash my car">
									</div>

									<button class="btn btn-success">Add</button>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<?php  
			if(isset($_GET['include']) && $_GET['include'] == 1) 
			{ 
		?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5 style="color: white !important;">Task succefully added!</h5>
			</div>
		<?php 
		    } 
		?>

	</body>
</html>