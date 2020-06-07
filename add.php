<?php  
session_start();
include ('connect.php');
if(!isset($_SESSION['username']))
{
	header ('Location: login.php');
	die();
}
if(isset($_POST["submit"]))
	
	{
		$name=$_POST["name"];
		$price=$_POST["price"];
		$code=$_POST["code"];
		$discount=$_POST["discount"];
		$array= $_POST["data"];
		$image=rand().".jpg";
		
		$stock=$_POST["instock"];
		
		move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$image);
		$query="INSERT INTO tblproducts set productName='$name', productPrice='$price', productCode='$code', productDetails='$array' , productDiscount='$discount', productImage='$image', productInstock='$stock'";
		if(mysqli_query($con,$query))
		{
			$message='<div class="feedback success">Successfully Product Added!</div>';
		}
		else
		{
			$message='<div class="feedback error">Adding Product Failed!</div>';
		}
	}	
	
include 'header.php';
include 'sidebar.php';
?>
<main role="main">
	<section class="panel important">
		<h2>Add new product!</h2>
		<div class="twothirds">
			<form method="POST" ation="" enctype = "multipart/form-data">
				<?php if(isset($message))echo $message;?>
				<div class="form-group">
					<label>Product Name:</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label>Product Image:</label>
					<input class="form-control" name="image" type="file">
				</div>
				<div class="form-group">
					<label>Product Price:</label>
					<input class="form-control" name="price" type="number" min="1" step="any">
				</div>
				<div class="form-group">
					<label>Product Instock:</label>
					<input class="form-control" name="instock" type="text" placeholder="Only Y/N">
				</div>
				<div class="form-group">
					<label>Product Code:</label>
					<input type="text" class="form-control" name="code">
				</div>
				<div class="form-group">
					<label>Product Discount:</label>
					<input class="form-control" name="discount" type="number" min="1"  max="100" step="any">
				</div>
				
				<div class="form-group">
					<label>Product Description:</label>
					<textarea class="form-control" cols="35" rows="12" name="data" id="para1"></textarea>
				</div>

				<input type="submit" class="btn btn-default" name="submit" />
			</form>
		</div>
	</section>
</main>

<?php 
	include 'footer.php';
?>