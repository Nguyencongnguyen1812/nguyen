<?php
require_once ('C:\xampp\htdocs\cuahangthucung1\admin\product\db\dbhelper.php');
$id='';
if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from category where id = '.$id;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$name = $category['name'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>THUỐC THÚ Y</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="vegetable_store.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <style>
        a{
            color: blanchedalmond;
        }
    </style>
	<!-- THANH MENU -->
	<div style="background:green;" class="menu"> <!-- THANH MENU START -->
		<nav class="navbar navbar-expand-sm">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Trang Chủ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Rau An Toàn</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Thủy Hản Sản</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Thực Phẩm Tươi Sống</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Công thức món ăn</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Liên hệ</a>
				</li>
			</ul>
			<form class="form-inline" action="/action_page.php">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Tìm kiếm">
					<div class="input-group-prepend">
						<span style="background-color: white;" class="input-group-text"><a style="color:black" href=""><i style="border: none" class="fas fa-search"></i></a></span>
					</div>
				</div>
			</form>
		</nav>
	</div> <!-- THANH MENU END -->
	<h2><?=$name?></h2>
	<Style>
		.row{
			width: 70%;
			border: black;
			border-style: inset;
			background-color: green;
			float: right;
		}
	</Style>
<?php
		$sql         = 'select product.id, product.title, product.price, product.thumbnail, product.updated_at, 
		category.name category_name from product left join category on product.id_category = category.id where category.id= '.$id;
		$productList = executeResult($sql);
		foreach($productList as $item)
		{
			echo'
			<div class="row">
			<div  class="col-md-4">
				<img src="'.$item['thumbnail'].'" style="width: 100%">
			</div>
			<p></p>
			<div  class="col-md-8">
				<p><a  href="chitietsp.php?id='.$item['id'].'"> tên: '.$item['title'].'</p>
				<p> giá: '.$item['price'].'</p>
			</div>
		</div>
		<div></div>
		<p>...</p>';
		}
		
?>

	
	</div> <!-- FOOTER END -->


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>