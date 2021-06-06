<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
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
        
	<div class="limiter">
    <?php
	$mysqli = new mysqli('localhost' , 'root' , '', 'billingsystem') or die (mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM user")or die($mysqli->error);
	?>
	
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-t-20 p-b-45">
						Tugonon Construction Services and Supply Billing System
                    </span>
                    
					<div class="row justify-content-center">
		            <form action="config.php" method="POST">
		            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <div class="wrap-input100 validate-input m-b-10" data-validate = "Position is required">
                                    <input class="input100" type="text" name="position" 
                                    value="<?php echo $position;?>" placeholder="Position">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                                    <input class="input100" type="text" name="name" 
                                    value="<?php echo $name;?>"placeholder="Username">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                                    <input class="input100" type="password" 
                                    value="<?php echo $password;?>" name="pass" placeholder="Password">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <br><br>
                            <div class="form-group">
                                <div class="container-login100-form-btn p-t-10">
                                    <input type="submit" class="login100-form-btn" value ="Login">2020
                                    </div>     
                                </div>
                            </div>

                        <div class="text-center w-full p-t-25 p-b-230">
                            <a href="#" class="txt1">
                                Forgot Username / Password?
                            </a>
                        </div>

                        <div class="text-center w-full">
                            <a class="txt1" href="#">
                                Create new account
                                <i class="fa fa-long-arrow-right"></i>						
                            </a>
                        </div>
				    </form>
                </div>
                </form>
                </div>
		</div>
	</div>
	
	

	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>