

<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
 
 
 
 <?php
    class product
    {


        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_product($data, $files)
        {

            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            //*kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "uploads/" . $unique_image;




            if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" || $file_name = "") {
                $alert = "<span class='error'>Các trường dữ liệu không được để trống</span> ";
                return $alert;
            } else {

                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
                $result = $this->db->insert($query);

                if ($result) {
                    $alert = "<span class='success'>Thêm Thành Công</span> ";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Thêm Không Thành Công</span> ";
                    return $alert;
                }
            }
        }

        public function show_product()
        {

            //* cách 1: lấy tất cả dữ liệu trong bảng ra 
            //  $query = "SELECT * FROM tbl_product order by productId desc";

            //* cách 2: lấy catName và productName trong bảng category và bàng brand
            //  $query = " SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName 
            //  FROM tbl_product INNER JOIN tbl_category on tbl_product.catId = tbl_category.catId 
            //  inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId 
            //  order by tbl_product.productId desc";

            //* cách 3: lấy catName và productName trong bảng category và bàng brand
            $query = " SELECT p.*,c.catName,b.brandName
             FROM tbl_product as p,tbl_category as c, tbl_brand as b where p.catId = c.catId
             AND p.brandId = b.brandId
             order by p.productId desc";



            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data, $file, $id)
        {

            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            //*kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "uploads/" . $unique_image;



            if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" ) {
                $alert = "<span class='error'>Các trường dữ liệu không được để trống</span> ";
                return $alert;
            } else {
                if(!empty($file_name)){
                    //* nếu người dùng chọn ảnh
                    if($file_size > 1000480){
                    $alert = "<span class='error'>Kích thước ảnh phải nhỏ hơn 10MB</span> ";
                    return $alert;
                    }
                    elseif(in_array($file_ext,$permited)===false)
                    {
                        $alert = "<span class='error'>Bạn chỉ có thể tải ảnh lên:".implode(',', $permited). "</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE tbl_product SET 
                    productName = '$productName',
                    brandId = '$brand',
                    CatId = '$category',
                    type = '$type',
                    price = '$price',
                    image = '$unique_image',
                    product_desc = '$product_desc'
                     where productId = '$id' "; 
                }else{
                    // nếu người dùng k chọn ảnh

                    $query = "UPDATE tbl_product SET 
                    productName = '$productName',
                    brandId = '$brand',
                    CatId = '$category',
                    type = '$type',
                    price = '$price',
                    product_desc = '$product_desc'
                     where productId = '$id' "; 
                }
                $result = $this->db->update($query);

                if ($result) {
                    $alert = "<span class='success'>Sửa Thành Công</span> ";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Sửa Không Thành Công</span> ";
                    return $alert;
                }
            }
     
        }

        public function del_product($id)
        {
            $query = "DELETE FROM tbl_product where productId = '$id'";
            $result = $this->db->delete($query);

            if ($result) {
                $alert = "<span class='success'>Xoá Thành Công</span> ";
                return $alert;
            } else {
                $alert = "<span class='error'>Xoá Không Thành Công</span> ";
                return $alert;
            }
            return $result;
        }

        public function getproductbyId($id)
        {
            $query = "SELECT * FROM tbl_product where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        // END Bakcend
        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product where type = '0'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_new(){
            $query = "SELECT * FROM tbl_product order by  productId desc LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id){
            $query = " SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName 
              FROM tbl_product INNER JOIN tbl_category on tbl_product.catId = tbl_category.catId 
             inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'";

            $result = $this->db->select($query);
            return $result;
        }
        
        public function getLastestNike(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '2' order by  productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastestBosston(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '3' order by  productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastestConvert(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '5' order by  productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastestFashion(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '6' order by  productId desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

       
           
        
    }
    ?>