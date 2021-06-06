<?php

session_start();

$mysqli = new mysqli('localhost' , 'root' , '', 'phpcrud') or die (mysqli_error($mysqli));

$id=0;
$name='';
$location='';
$update=false;

if(isset($_POST['submit'])){
	$name=$_POST['name'];
    $location=$_POST['location'];
    $contact=$_POST['contact'];
    $tin=$_POST['tin'];
	
	$mysqli->query("INSERT INTO data(name, location,contact,tin) VALUES('$name', '$location','$contact','$tin')") or
			die($mysqli->error);

	$_SESSION['message'] ="Record has been saved!";
	$_SESSION['msg_type'] ="success";

	header('location:accounts.php');
}

if (isset($_GET['delete'])){
	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] ="Record has been deleted!";
	$_SESSION['msg_type'] ="Warning! You have deleted a record"; 

	header('location:accounts.php');
}
if (isset($_GET['edit'])){
	$id=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
	if (count($result)==1){ //record has been found in the db
		$row=$result->fetch_array(); //return the data from the record
		$name=$row['name'];
        $location=$row['location'];
        $contact=$row['contact'];
        $tin=$row['tin'];
	} 
}
if (isset($_POST['update'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
    $location=$_POST['location'];
    $contact=$_POST['contact'];
    $tin=$_POST['tin'];

	$mysqli->query("UPDATE data SET name='$name', location='$location' ,contact='$contact', tin='$tin' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message']= "Record has been updated";
	$_SESSION['msg_type'] ="warning"; 

	header('location:accounts.php');
}
?>
