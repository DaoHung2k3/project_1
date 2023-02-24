<?php
 include 'inc/header.php';
?>

<?php
if(isset($_GET['cartid']) ){
    $cartid = $_GET['cartid'];
	$delcart = $ct->del_product_cart($cartid); 

}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$cartId = $_POST['cartId']; 
	$quantity = $_POST['quantity'];
	$update_quantity_cart = $ct->update_quantity_cart($quantity,$cartId); 

	if($quantity<=0){
		$delcart = $ct->del_product_cart($cartId); 
	}
}
?>

<?php
// nêu không tồn tại $Get
if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content=0;URL=?id=live'>";
	// refresh trình duyệt để lấy đúng giỏ hàng

}
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
					<?php
					if(isset($update_quantity_cart)){
						echo $update_quantity_cart;
					}
					?>
					<?php
					if(isset($delcart)){
						echo $delcart;
					}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">ảnh</th>
								<th width="15%">giá</th>
								<th width="25%">số lượng</th>
								<th width="20%">tổng tiền</th>
								<th width="10%"></th>
							</tr>
							<?php
									$get_product_cart = $ct->get_product_cart();
									$subtotal = 0;
									$qty=0;

									if($get_product_cart){
										while($result = $get_product_cart->fetch_assoc()){

							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" min="1" value="<?php echo $result['cartId'] ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php 
								$total = $result['price'] * $result['quantity'];

								echo $total;
								?>
								</td>
								<td><a href="?cartid=<?php echo $result['cartId'] ?>">Xoá</a></td>
							</tr>	
							<?php
									  $subtotal += $total;
									  	$qty = $qty + $result['quantity'];

										}
							}
							?>					
						</table>
							<?php
								$check_cart = $ct->check_cart();
									if($check_cart){
										
									
									?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng giá : </th>
								<td>
									<?php 
									  		echo $subtotal.' '.'VNĐ';
											Session::set('sum',$subtotal);
											Session::set('qty',$qty);
											


									?></td>
							</tr>
							<tr>
								<th>Phí ship : </th>
								<td>
								<?php
										if($subtotal > 0){
											$ship = 30000;
											echo $ship . ' ' . 'VNĐ';
										}else{
											$ship_none = 0;
											echo $ship_none . ' ' . 'VNĐ';
										}
								 	?>
								</td>
							</tr>
							<tr>
								<th>Thành tiền :</th>
								<td>
									<?php
										if($subtotal > 0){
											$ship = 30000;
											$gtotal = $subtotal + $ship;
											echo $gtotal.' '.'VNĐ';
										}else{
											$ship_none = 30000 * 0;
											$gtotal = $subtotal + $ship_none;
											echo $gtotal.' '.'VNĐ';
										}
								 	?>
								 </td>
							</tr>
					   </table>
					   <?php
					   }
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
	include("inc/footer.php"); 
?>