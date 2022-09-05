<!-- <?php
include '../classes/adminlogin.php';
?>


<?php
$class = new  adminlogin();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$adminUser = $_POST['adminUser'];
	$adminPass = md5($_POST['adminPass']);

	$login_check = $class->login_admin($adminUser,$adminPass); 
}
?>  -->
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="style/css/login.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color: #74ebd5;">
    <div class="container" >
        <!-- content -->
            <div class="main h-auto text-center justify-content-center ml-auto mr-auto">
                <form action="login.php" method="post" >
                            <h1 class="text-uppercase text- mb-3">Admin Login</h1>
                            <span>
                            <?php
                            if(isset($login_check)){
                                echo $login_check;
                            }
                            ?>
                        </span>
                            <div class="mb-3 ">
                                <input type="text" placeholder="Username" required="" name="adminUser" class="p-1 w-100"/>
                            </div>
                            <div class="mb-3">
                                <input type="password" placeholder="Password" required="" name="adminPass" class="p-1 w-100"/>
                            </div>
                            <div>
                                <input type="submit" value="Log in" class="w-100 rounded"/>
                            </div>
                </form>
                <!-- form -->
                <!-- <form action="login.php" method="post">
                        <h1 class="text-warning">Admin Login</h1>
                         

                        <div>
                            <input type="text" placeholder="Username" required="" name="adminUser"/>
                        </div>
                        <div>
                            <input type="password" placeholder="Password" required="" name="adminPass"/>
                        </div>
                        <div>
                            <input type="submit" value="Log in" />
                        </div>
                </form> -->
            </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

