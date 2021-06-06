
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>ACCOUNTS</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="d-flex flex-grow-1">
        <span class="w-100 d-lg-none d-block"></span>
        <a class="navbar-brand d-none d-lg-inline-block" href="#"> <img src="images/pic02.png" width="90" height="60">
        </a>
        <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
            <img src="images/pic02.png" alt="logo">
        </a>
        <div class="w-100 text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
        <ul class="navbar-nav ml-auto flex-nowrap">
            <li class="nav-item">
                <a href="index.php" class="nav-link m-2 menu-item nav-active">BILLING</a>
            </li>
            <li class="nav-item">
                <a href="employee.php" class="nav-link m-2 menu-item nav-active">EMPLOYEE</a>
            </li>
            <li class="nav-item">
                <a href="accounts.php" class="nav-link m-2 menu-item nav-active">ACCOUNTS</a>
            </li>
            <li class="nav-item">
                <button type="submit" class="nav-link m-2 menu-item nav-active">SIGN OUT</a>
            </li>
        </ul>
    </div>
</nav>

<div class="jumbotron jumbotron-fluid bg-dark text-white" margin>
  <div class="container container-fluid">
    <h5>Accounts</h5>
  </div>
</div>

	<?php require_once 'config.php' ; ?>
		<?php

		if (isset($_SESSION['message'])): ?>

		<div class="alert alert-<?=$_SESSION['msg_type']?>">

			<?php

				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
		<?php endif ?>

<div class="container">
	<?php
	$mysqli = new mysqli('localhost' , 'root' , '', 'phpcrud') or die (mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM data")or die($mysqli->error);
	?>
	
	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
          <th>Address</th>
          <th>Contact No</th>
          <th>Company Tin</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php
				while($row =$result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['name'];?></td>
          <td><?php echo $row['location'];?></td>
          <td><?php echo $row['contact'];?></td>
					<td><?php echo $row['tin'];?></td>
					<td>
						<a href="accounts.php?edit=<?php echo $row['id']; ?>"
							class="btn btn-info">Edit</a>
						<a href="config.php?delete=<?php echo $row['id']; ?>"
							class="btn btn-danger">Delete</a>
							
					</td>
				</tr>
				<?php endwhile; ?>
		</table>
	</div>
	<?php
	function pre_r($array){
		echo '<prev>';
		print_r($array);
		echo '</pre>';
	}
	?>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<div class="row justify-content-center">
		<form action="config.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label>Client Name</label>
				<input type="text" name="name" 
				value="<?php echo $name;?>"
				class="form-control" placeholder="Enter Client's Name">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" name="location" 
				value="<?php echo $location;?>"
				class="form-control" placeholder="Enter Location">
      </div>
      <div class="form-group">
				<label>Contact No</label>
				<input type="text" name="contact" 
				value="<?php echo $contact;?>"
				class="form-control" placeholder="Enter Contact">
      </div>
      <div class="form-group">
				<label>Company Tin</label>
				<input type="text" name="tin" 
				value="<?php echo $tin;?>"
				class="form-control" placeholder="Enter Company Tin">
			</div>
				<div class="form-group">
				<?php
				if	($update == true):
				?>
				<button type="submit" class="btn btn-info" name="update">Update</button>
				<?php else: ?>
				<button type="submit" class="btn btn-primary" name="submit">Save</button>
				<?php endif; ?>
			</div>
		</form>
	</div>
</div>
</body>