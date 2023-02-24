
<?php
include 'inc/header.php';
?>

<?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
}
    $qr = "SELECT * FROM tbl_product,tbl_category = tbl_cateogry.catId AND tbl_product.productName LIKE '%$tukhoa%' ";
    $result = mysqli_query($result,$qr)
?>
<div class="content_bottom">
				<div class="heading">
					<h3>Sản Phẩm tìm được với từ khoá: <?php echo $_POST['tukhoa'] ?></h3>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section group" >
				<?php
					while ($result_search = mysqli_fetch_array($result)) {
				?>
						<div class="grid_1_of_4 images_1_of_4" style="height: 400px ;">
							<a href="details.php"><img src="admin/uploads/<?php echo $result_search['image'] ?>" alt="" style="width:200px;" ; /></a>
							<h2><?php echo $result_search['productName'] ?> </h2>
							<p><?php echo $fm->textShorten($result_search['product_desc'], 50)  ?></p>
							<p><span class="price"><?php echo $result_search['price'] . "" . "VND " ?></span></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $result_search['productId'] ?>" class="details">Thông Tin</a></span></div>
						</div>

						<?php
								}
							
						?>
			</div>

<?php
include("inc/footer.php");
?>