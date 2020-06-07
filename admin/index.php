<?php  
session_start();
require('../requires/connect.php');
if(!isset($_SESSION['username']))
{
	header ('Location: login.php');
	die();
}
$query="SELECT * from tblproducts WHERE productInStock='Y' ORDER BY productId DESC";
$result=mysqli_query($con,$query);

include 'includes/header.php';
include 'includes/sidebar.php';
?>
<main role="main">
  <section class="panel important">
    <h2>Welcome to Your Dashboard </h2>
	<div class="threethirds">
	
		<table class="table table-bordered" align="center">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php while($row=mysqli_fetch_array($result)){
      echo'<tr>
        <td>'.$row["productId"].'</td>
        <td>'.$row["productName"].'</td>
        <td><a href="/product_details.php?id='.$row["productId"].'" target="_blank">View</a> | <a href="edit.php?id='.$row["productId"].'">Edit</a> | <a href="delete.php?id='.$row["productId"].'" onclick="confirm(\'Are You sure you want to delete this record?\')">Delete</a></td>
	</tr>';}
	  
	  ?>
      
     
    </tbody>
  </table>
	
	
	</div>
	
	
	 </section>
  
  
</main>
<?php include 'includes/footer.php';?>