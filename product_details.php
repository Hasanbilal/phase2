<?php 
include ('connect.php');
include 'header_main_page.php'; 
$id=$_GET["id"];
$query="SELECT * from tblproducts WHERE productId=$id";
$row=mysqli_fetch_assoc(mysqli_query($con,$query));
if($row["productInstock"]=='Y'){
	$stock='In Stock';
}
else{
	$stock='Not In Stock';
}
?>
	 <div class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12"><br />	   			
					<h2 class="title text-center">Product Details</h2>    			    				    				
				
					<div class="product-details">
					<?php 
						echo'
						<div class="pro">
							<div class="prodi">
								<img src="uploads/'.$row["productImage"].'" alt="">
							</div>

							<div class="details">
								<h2>'.$row["productName"].'</h2>
								<p>Product Code: '.$row["productCode"].'</p>	
								<h6>PKR: '.$row["productPrice"].'</h6>
								<p><b>Discount:</b> '.$row["productDiscount"].'%</p>
								<h3>Details:</h3>
								<p>'.$row["productDetails"].'</p>	
								
							</div>
						</div>
						<div class="adqb">
							<div class="ad">
							<!--	<p><b>Availability:</b> '.$stock.'</p>-->
								
								
							</div>
							
							<div class="qb">
								<label>Quantity:</label>
							
								<input type="text" value="0" id="inp"/>&nbsp;
							
								<button type="button" class="btn btn-fefault cart">
									<i class="fa fa-shopping-cart"></i>Add to cart
								</button>
							</div>
						</div>';
						?>
					</div>
					
					
					
					
				</div> 
    	</div>	
    </div> 
	</div>
	<hr/>
	<?php include 'footer_main_page.php';?>