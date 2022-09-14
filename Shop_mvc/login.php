<?php
 include 'inc/header.php';
 include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Khách Hàng Hiện Tại</h3>
        	<p>Đăng nhập bằng biểu mẫu bên dưới</p>
        	<form action="hello" method="get" id="member">
                	<input name="Domain" type="text" value="Tên đăng nhập" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                    <input name="Domain" type="password" value="Password" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                 </form>
                 <p class="note"> <a href="#">Quên mật khẩu</a></p>
                    <div class="buttons"><div><button class="grey">Đăng Nhập</button></div></div>
                    </div>
    	<div class="register_account">
    		<h3>Đăng ký tài khoản mới</h3>
    		<form>
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" value="Tên" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" >
							</div>
							
							<div>
							   <input type="text" value="Thành Phố" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}">
							</div>
							
							<div>
								<input type="text" value="Mã Bưu chính" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Zip-Code';}">
							</div>
							<div>
								<input type="text" value="E-Mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Mail';}">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" value="Địa Chỉ Nhà" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null"> Quốc Gia</option> 
							<option value="VN">Việt Nam</option>       
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" value="SĐT" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
		          </div>
				  
				  <div>
					<input type="text" value="Mật Khẩu" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey">Tạo Tài Khoản</button></div></div>
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