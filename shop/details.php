
<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
<?php
if(!isset($_GET['proid'])||$_GET['proid']==NULL){
    echo"<script>window.location='404.php'</script>"; 
}else{
    $id=$_GET['proid'];
}
$ct= new cart();
if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['submit'])){
     $quantity=$_POST['quantity'];
    $AddtoCart=$ct->add_to_cart($quantity,$id);
}
 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
         $get_product_detail=$pd->get_detail($id);
         if($get_product_detail){
         	while($result_detail=$get_product_detail->fetch_assoc()){
    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_detail['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_detail['productName']?></h2>
					<p><?php echo $result_detail['product_desc']?></p>					
					<div class="price">
						<p>Price: <span><?php echo $result_detail['price']."VND"?></span></p>
						<p>Category: <span><?php echo $result_detail['catName']?></span></p>
						<p>Brand:<span><?php echo $result_detail['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result_detail['product_desc']?>
	    </div>
				
	</div>
	         <?php 
         	}
          }
	      ?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<?php 
                    $get_allcategory=$cat->get_all_category();
                    if($get_allcategory){
                    	while($result_all_category= $get_allcategory->fetch_assoc()){              
					?>
					<ul>
				      <li><a href="productbycat.php?catid=<?php echo $result_all_category['catId'] ?>"><?php echo $result_all_category['catName']?></a></li>			   
    				</ul>
    	           <?php 
    	              }
                    }
    	           ?>
 				</div>
 		</div>
 	</div>
 </div>
	<?php
include 'inc/footer.php';

?>

