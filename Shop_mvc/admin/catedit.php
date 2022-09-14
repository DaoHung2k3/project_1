<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php
if(isset($_GET['catid']) && $_GET['catid']!=NULL){
    $id = $_GET['catid'];
}
$cat = new category();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
               <div class="block copyblock"> 
               <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                <?php
                    $get_cate_name = $cat->getcatbyId($id); 
                    if($get_cate_name){
                        while($result = $get_cate_name->fetch_assoc()){  
                ?> 
                 <form action="catadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName'] ;?>" name="catName" placeholder="Sửa Danh Mục" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                                }
                            }                    
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>