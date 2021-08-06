<?php
    $user = $_POST['username'];
    $pass =$_POST['password'];
    $db =mysqli_connect("localhost", "root", "", "bt1947");
    $sql ="select * from login where username= '$user' and password='$pass'";
    $rs =mysqli_query($db,$sql);
    if(mysqli_num_rows($rs)>0){
         echo "<h1>dăng nhap thanh cong </h1>";
         header("Location: category");
    }
    else
    {
        echo "<h2>that bai</h2>";
        require_once 'login.php';
    }
 ?>