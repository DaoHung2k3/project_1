<?php
 include 'inc/header.php';
 
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="images/Giay/G_4.jpg" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2>Lorem Ipsum is simply dummy text </h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>					
					<div class="price">
						<p>Giá: <span>$500</span></p>
						<p>Loại: <span>Giày</span></p>
						<p>Nhãn Hiệu:<span>NIKE</span></p>
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
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh Mục Sản Phẩm</h2>
					<ul>
				      <li><a href="productbycat.php">Giày Nam</a></li>
				      <li><a href="productbycat.php">Giày Nữ</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>

	<?php
		include 'inc/footer.php';
	?>


