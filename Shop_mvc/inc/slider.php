<div class="header_bottom">
	<div class="header_bottom_left">
		<div class="section group">
			<?php
			$getLastestNike = $product->getLastestNike();
			if ($getLastestNike) {
				while ($resultnike = $getLastestNike->fetch_assoc()) {

			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="details.php"> <img src="admin/uploads/<?php echo $resultnike['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2><?php echo $resultnike['productName'] ?></h2>
							<p><?php echo $resultnike['product_desc'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultnike['productId'] ?>">Thông tin </a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>

			<?php
			$getLastestBosston = $product->getLastestBosston();
			if ($getLastestBosston) {
				while ($resultbosston = $getLastestBosston->fetch_assoc()) {

			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="details.php"> <img src="admin/uploads/<?php echo $resultbosston['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2><?php echo $resultbosston['productName'] ?></h2>
							<p><?php echo $resultbosston['product_desc'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultbosston['productId'] ?>">Thông tin </a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>


		</div>

		<div class="section group">
			<?php
			$getLastestConvert = $product->getLastestConvert();
			if ($getLastestConvert) {
				while ($resultconvert = $getLastestConvert->fetch_assoc()) {

			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="details.php"> <img src="admin/uploads/<?php echo $resultconvert['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2><?php echo $resultconvert['productName'] ?></h2>
							<p><?php echo $resultconvert['product_desc'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultconvert['productId'] ?>">Thông tin </a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>

			<?php
			$getLastestFashion = $product->getLastestFashion();
			if ($getLastestFashion) {
				while ($resultfashion = $getLastestFashion->fetch_assoc()) {

			?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="details.php"> <img src="admin/uploads/<?php echo $resultfashion['image'] ?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2><?php echo $resultfashion['productName'] ?></h2>
							<p><?php echo $resultfashion['product_desc'] ?></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $resultfashion['productId'] ?>">Thông tin </a></span></div>
						</div>
					</div>
			<?php
				}
			}
			?>


		</div>


		<div class="clear"></div>
	</div>
	<div class="header_bottom_right_images">
		<!-- FlexSlider -->

		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<li><img src="images/slider/S_1.jpg" alt="" /></li>
					<li><img src="images/slider/S_2.jpg" alt="" /></li>
					<li><img src="images/slider/S_3.jpg" alt="" /></li>
					<li><img src="images/slider/S_4.jpg" alt="" /></li>
				</ul>
			</div>
		</section>
		<!-- FlexSlider -->
	</div>
	<div class="clear"></div>
</div>