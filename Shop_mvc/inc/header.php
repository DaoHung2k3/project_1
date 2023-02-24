
<?php

include 'lib/session.php';
Session::init();
?>

<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';



spl_autoload_register(function($className){
	include_once "classes/".$className.".php";

});

$db = new Database();
$fm = new Format(); 
$ct = new cart();
$us = new user();
$cat = new category();
$cs = new customer();
$product = new product();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?> 




<!DOCTYPE HTML>
<head>
	
<title>Shop Giày</title>
<link  href="images/logo/L_1.jpg" rel="icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo/L_2.jpg" alt="" style="width: auto; height:130px;"/></a>
			</div>
			  <div class="header_top_right">
					
				
			    <div class="search_box">
				    <form action="index.php" method="POST">
				    	<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
						<input type="submit" value="Tìm Kiếm" name="timkiem">
				    </form>
			    </div>
			    <div class="shopping_cart">
				
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow" class="cart-heading" style="position: relative;">
								<span class="cart_title">Giỏ Hàng</span>
								<span class="no_product"><?php
								$check_cart = $ct->check_cart();
								if($check_cart){
									$sum = Session::get("sum");

									echo $sum . ' '. 'vnđ';
								}else{
									echo '0 vnđ'; 
								}
								 ?>
								 </span>
							</a>
						</div>
			      </div>
				  <div id="circle" style="background: #ccc;border: 1px solid #0F1C3F;border-radius: 50%;height: 25px;width: 25px;position:absolute;z-index:1000;right:34%;top:5%;text-align:center; line-height: 25px;">
				  <?php 
						if($check_cart){
							$qty = Session::get("qty");
							echo $qty ;
						}else{
							echo '0';
						}

				  ?>
				</div>
				<?php
				if(isset($_GET['customer_id'])){
					$delCart = $ct->del_all_data_cart();
					Session::destroy();
				}
				?>
		   <div class="login">
				<?php
					$login_check = Session::get('customer_login');
					if($login_check==false){
						echo '<a href="login.php">Đăng Nhập</a></div>';
					}else{

						echo '<a href="?customer_id='.Session::get('customer_id').'">Đăng Xuất</a></div>';

					}
				?>

		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li ><a href="index.php">Trang Chủ</a></li>
	  <li id="new-nav">
		<a href="products.php">
				Sản Phẩm
		</a>
					<ul class="sub-menu">
							<li><a href="products.php">sản phẩm nam</a></li>
							<li><a href="products.php">sản phẩm nữ	</a></li>
					</ul>
	 </li>
	  <li><a href="topbrands.php">Sản phẩm dùng nhiều</a></li>
	  <li><a href="cart.php">Giỏ Hàng</a></li>
	  <li><a href="contact.php">Liên Hệ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>