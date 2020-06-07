<?php  
session_start();
require('../requires/connect.php');
if(!isset($_SESSION['username']))
{
	header ('Location: login.php');
	die();
}
if(isset($_POST["submit"]))
	
	{
		$title=$_POST["title"];
		$price=$_POST["price"];
		$code=$_POST["code"];
		$discount=$_POST["discount"];
		$image=rand().".jpg";
		$description=$_POST["description"];
		$stock=$_POST["instock"];
		
		move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/".$image);
		$query="INSERT INTO tblproducts set productName='$title', productPrice='$price', productCode='$code', productDiscount='$discount', productDetails='$description', productImage='$image', productInstock='$stock'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			$message='<div class="feedback success">Product Added!</div>';
		}
		else
		{
			$message='<div class="feedback error">Error while adding product</div>';
		}
	}
include 'includes/header.php';
include 'includes/sidebar.php';
?>
<main role="main">
  <section class="panel important">
    <h2>Add new product!</h2>
	<div class="twothirds">
    <form method="POST" ation="" enctype = "multipart/form-data">
			<?php if(isset($message))echo $message;?>
			  <div class="form-group">
				<label>Product Title:</label>
				<input type="text" class="form-control" name="title">
			  </div>
			   <div class="form-group">
				<label>Product Price:</label>
				<input class="form-control" name="price" type="number" min="1" step="any">
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
				<label>Product Image:</label>
				<input class="form-control" name="image" type="file">
			  </div>
			   <div class="form-group">
				<label>Product Description:</label>
				<textarea class="form-control" name="description" form="form-crud"></textarea>
			  </div>
			  <div class="form-group">
				<label>Product Instock:</label>
				<input class="form-control" name="instock" type="text" placeholder="Only Y/N">
			  </div>
			  <input type="submit" class="btn btn-default" name="submit" />
			</form>
			</div>
  </section>
  
  
</main>
<?php include 'includes/footer.php';?>