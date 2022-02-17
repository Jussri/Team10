<?php

$host = "db";
$username = "root";
$password = "";
$database = "users";

session_start();


$conn = mysqli_connect("db", "root", "password", "users");


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST["email"];
	$password=$_POST["password"];


	$sql="select * from login where email='".$email."' AND password='".$password."' ";

	$result=mysqli_query($sql, "users");

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	

		$_SESSION["email"]=$email;

		header("location:users.php");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["email"]=$email;
		
		header("location:adminhome.php");
	}

	else
	{
		echo "username or password incorrect";
	}

}




?>