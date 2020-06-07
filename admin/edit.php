<?php  
session_start();
require('../requires/connect.php');
if(!isset($_SESSION['username']))
{
	header ('Location: login.php');
	die();
}
$id=$_GET["id"];
if(isset($_POST["submit"]))
	
	{
		$title=$_POST["title"];
		$price=$_POST["price"];
		$code=$_POST["code"];
		$discount=$_POST["discount"];
		$description=$_POST["description"];
		
		$query="UPDATE tblproducts set productName='$title', productPrice='$price', productCode='$code', productDiscount='$discount', productDetails='$description' WHERE productId='$id'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			$message='<div class="feedback success">Product Updated!</div>';
		}
		else
		{
			$message='<div class="feedback error">Error while adding product</div>';
		}
	}

$query="SELECT * from tblproducts WHERE productId=$id";
$row=mysqli_fetch_assoc(mysqli_query($con,$query));
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<main role="main">
  <section class="panel important">
    <h2>Edit product </h2>
	<div class="twothirds">
    <form method="POST" ation="" enctype = "multipart/form-data">
			<?php if(isset($message))echo $message;?>
			 <?php
		echo'
			 <div class="form-group">
				<label>Product Title:</label>
				<input type="text" class="form-control" name="title" value="'.$row["productName"].'">
			  </div>
			   <div class="form-group">
				<label>Product Price:</label>
				<input class="form-control" name="price" type="number" min="1" step="any" value="'.$row["productPrice"].'">
			  </div>
			   <div class="form-group">
				<label>Product Code:</label>
				<input type="text" class="form-control" name="code" value="'.$row["productCode"].'">
			  </div>
			   <div class="form-group">
				<label>Product Discount:</label>
				<input class="form-control" name="discount" type="number" min="1"  max="100" step="any" value="'.$row["productDiscount"].'">
			  </div>
			   <div class="form-group">
				<label>Product Description:</label>
				<textarea class="form-control" name="description">'.$row["productDetails"].'</textarea>
			  </div>
			  
			  
			 
			  <input type="submit" class="btn btn-default" name="submit" value="Update!"/>
			  ';
			?>
			</form>
			</div>
  </section>
  
  
</main>
<?php include 'includes/footer.php';?>