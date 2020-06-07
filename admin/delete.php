<?php
session_start();
require('../requires/connect.php');
if(!isset($_SESSION['username']))
{
	header ('Location: login.php');
	die();
}
$id=$_GET["id"];
if(isset($id))
	
	{
		
		$query="DELETE FROM tblproducts WHERE productId='$id'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			header('Location: index.php');
		}
		else
		{
			$message="Error while deleting product";
		}
	}



?>
