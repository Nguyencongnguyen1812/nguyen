<?php
    $user = $_POST['username'];
    $pass =$_POST['password'];
    $db =mysqli_connect("localhost", "root", "", "bt1947");
    $sql ="select * from login where username= '$user' and password='$pass'";
    $rs =mysqli_query($db,$sql);
    if(mysqli_num_rows($rs)>0)
    //echo "<h1>dăng nhap thanh cong </h1>";
        header("Location: category");
    else
    {
        echo "<h2>that bai</h2>";
        require_once 'login.php';
    }
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registation Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Login Page</h2>
            </div>
            <div class="panel-body">
                <form action="login.php" method="post" role="from">
                    <div class="form-group">
                        <label for="">User Name:</label>
                        <input type="text" class="form-control" id="" , placeholder="Input username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="text" class="form-control" id="" name="password">
                    </div>
                    <button type= "submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>