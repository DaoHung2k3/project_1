

<?php
 
include '../lib/database.php';
include '../helpers/format.php';
?>



<?php
class category
{


        private $db;
        private $fm;   

        public function __construct(){
                $this->db = new Database();
                $this->fm = new Format();
        }

        public function insert_category($catName){

                $catName = $this->fm->validation($catName);
                $catName = mysqli_real_escape_string($this->db->link,$catName);
                

                if(empty($catName)){
                    $alert = "<span class='error'>Danh mục không được để trống</span> ";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
                    $result = $this->db->insert($query);

                    if($result){
                        $alert = "<span class='success'>Thêm Thành Công</span> ";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Thêm Không Thành Công</span> ";
                        return $alert;
                    }
            }
        }

        public function show_category(){
            $query = "SELECT * FROM tbl_category order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($catName,$id){
                $catName = $this->fm->validation($catName);
                $catName = mysqli_real_escape_string($this->db->link,$catName);
                $id = mysqli_real_escape_string($this->db->link,$id);


                if(empty($catName)){
                    $alert = "<span class='error'>Tên danh mục không được để trống</span> ";
                    return $alert;
                }else{
                    $query = "UPDATE tbl_category SET catName = '$catName' where catId = '$id' ";
                    $result = $this->db->update($query);

                    if($result){
                        $alert = "<span class='success'>Sửa Thành Công</span> ";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Sửa Không Thành Công</span> ";
                        return $alert;
                    }
                }       
        }

        public function del_category($id){
            $query = "DELETE FROM tbl_category where catId = '$id'";
            $result = $this->db->delete($query);

            if($result){
                $alert = "<span class='success'>Xoá Thành Công</span> ";
                return $alert;
            }else{
                $alert = "<span class='error'>Xoá Không Thành Công</span> ";
                return $alert;
            }
            return $result;
        }

        public function getcatbyId($id){
            $query = "SELECT * FROM tbl_category where catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
}
?>