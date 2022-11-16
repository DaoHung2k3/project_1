<?php
 include 'inc/header.php';
 
?>

<?php
if(isset($_GET['proid']) && $_GET['proid']!=NULL){
    $id = $_GET['proid'];
}
?>

 <div class="main">
    <div class="content">
    	<div class="section group">

		<?php
			$get_product_details = $product->get_details($id);

			if($get_product_details){
				while($result_details = $get_product_details->fetch_assoc()){
			
		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="images/Giay/G_4.jpg" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?> </h2>
					<p><?php echo $fm->textShorten( $result_details['product_desc'], 100) ?> </p>					
					<div class="price">
						<p>Giá: <span><?php echo $result_details['price'] .""."VND"?> </span></p>
						<p>Loại: <span><?php echo $result_details['catName'] ?> </span></p>
						<p>Nhãn Hiệu:<span><?php echo $result_details['brandName'] ?> </span></p>
					</div>
				<div class="add-cart">
					<form action="cart.php" method="post">
						<input type="number" class="buyfield" name="" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Thông Tin Chi tiết sản phẩm</h2>
			<p><?php echo $fm->textShorten( $result_details['product_desc'], 300) ?> </p>	
	    </div>		
	</div>

	<?php
			}
		}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh Mục Sản Phẩm</h2>
					<ul>
				      <li><a href="productbycat.php">Giày Nam</a></li>
				      
    				</ul>
    	
 				</div>
 		</div>
 	</div>

	<?php
		include 'inc/footer.php';
	?>


