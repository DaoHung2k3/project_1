<?php
include 'inc/header.php';
//  include 'inc/slider.php';
?>
<?php
$login_check = Session::get('customer_login');
if($login_check){
	header('location:order.php');
}	

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

	$insertCustomers = $cs->insert_customers($_POST);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

	$login_Customers = $cs->login_customers($_POST);
}
?>

<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Khách Hàng Hiện Tại</h3>
			<?php
			if (isset($login_Customers)) {
				echo $login_Customers;
			}
			?>
			<form action="" method="POST">
				<input  type="text" name="email" class="field" placeholder="Nhập email">
				<input  type="password" name="password" class="field" placeholder="Nhập password">
				<p class="note"> <a href="#">Quên mật khẩu</a></p>
				<div class="buttons">
					<div><input type="submit" name="login" class="grey" value="Đăng nhập" style="height:36px;color: #fff;border-radius:10px ;cursor: pointer;background: #303030;"></div>
				</div>
			</form>

		</div>
		<?php

		?>
		<div class="register_account">
			<h3>Đăng ký tài khoản mới</h3>
			<?php
			if (isset($insertCustomers)) {
				echo $insertCustomers;
			}
			?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Tên">
								</div>

								<div>
									<input type="text" name="city" placeholder="Thành phố">
								</div>

								<div>
									<input type="text" name="zipcode" placeholder="mã bưu chính">
								</div>
								<div>
									<input type="text" name="email" placeholder="email">
								</div>
							</td>
							<td>
								<div>
									<input type="text" placeholder="Địa chỉ" name="address">
								</div>
								<div>
									<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
										<option value="null"> Quốc Gia</option>
										<option value="VN">Việt Nam</option>
										<option value="MY">Mỹ</option>
										<option value="TL">Thái lan</option>

									</select>
								</div>

								<div>
									<input type="text" name="phone" placeholder="SĐT">
								</div>

								<div>
									<input type="text" name="password" placeholder="mật khẩu"">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class=" search">
									<div><input type="submit" name="submit" class="grey" value="Tạo tài khoản" style="height: 36px;
	color: #fff;
	border-radius:10px ;
	cursor: pointer;
	background: #303030;"></div>
								</div>
								<p class="terms">Bằng cách nhấp vào 'Tạo Tài khoản', bạn đồng ý với <a href="#">Điều kiện</a>.</p>
								<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php
include("inc/footer.php");
?>