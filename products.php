<?php
include ('connect.php');
include 'header_main_page.php'; 
$query="SELECT * from tblproducts WHERE productInStock='Y' ORDER BY productId DESC";
?>

<html>
	<head>
		
	</head>
	<body>
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="bread"><span><a href="Home.php">Home</a></span> / <span>Product</span></p>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container">
		<div id="heading">
			<h1>All Products</h1>
		</div>
		<div class="pro">
			<?php
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result)){
				echo '
					<div class="prod">
						<a href="product_details.php?id='.$row["productId"].'" class="a-tag"><img src="uploads/'.$row["productImage"].'" alt=""></a>
						<h5>PKR '.$row["productPrice"].'</h5>
						<p>'.$row["productName"].'</p>
						<a href="product_details.php?id='.$row["productId"].'" class="a-button"><i class="fa fa-shopping-cart"></i>Product Details</a>
					</div>';
				}
			?>
		</div>
	</div>
	
	<hr/>
	
	<?php include 'footer_main_page.php';?>
	</body>
</html>