﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php include_once '../helpers/format.php';?>
<?php
$pd = new product();
$fm = new Format();

if(isset($_GET['productid']) ){
    $id = $_GET['productid'];
	$delpro = $pd->del_product($id); 

}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Mô tả</th>
					<th>type</th>
					<th>Tùy chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php
					

					$pdlist = $pd->show_product();
					if($pdlist){
						$i=0;
						while($result = $pdlist->fetch_assoc()){
								$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="50px"></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $fm->textShorten( $result['product_desc'], 50) ?></td>
					<td><?php 
						if($result['type'] == 0){

							echo 'nổi bật';
						}else{
							echo ' không nổi bật';
						}

					?>
					</td>
					<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> || 
					<a href="?productid=<?php echo $result['productId'] ?>">Delete</a></td>
				</tr>
				<?php
						}
					}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
