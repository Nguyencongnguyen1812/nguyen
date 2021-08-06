<?php
require_once ('C:\xampp\htdocs\cuahangthucung1\admin\product\db\dbhelper.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>News Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
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
	</div> 
	<style>
		a{
            color: blanchedalmond;
        }
		td{
			color: blanchedalmond;
		}
		.panel-body{

width: 100%;

}
.danhmuc{
width:30% ;
float: left;
text-align: center;
margin-top: 10px;
}
.danhsach{
width: 60%;
float:right ;
text-align: center;
}
.row{
	border-style: inset;
	border: top 10px;right: 10px; ;
}
</style>
<div  class="panel-body">
<div  class="danhsach">
<?php
$sql         = 'select products.id, products.title, products.price, products.thumbnail, products.updated_at, 
category.name category_name from products left join category on products.id_category = category.id';
//.' limit '.$firstIndex.', '.$limit;
$productList = executeResult($sql);

$sql         = 'select count(id) as total from products where 1 ';
$countResult = executeSingleResult($sql);
$number      = 0;
if ($countResult != null) {
	$count  = $countResult['total'];
}

foreach ($productList as $item) {
 	echo '
	 <div style="background: limegreen;" class="row">
			<div class="col-md-4">
			<p><a  href="chitietsp.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="max-width: 100%"/></p>
			</div>
			<div  class="col-md-8">
			<p> tên thuốc: <a  href="chitietsp.php?id='.$item['id'].'">'.$item['title'].'</p>
			<p> giá: '.$item['price'].'</td>
			<p>tên loại thuốc: '.$item['category_name'].'</p>
			<p>ngayd updated: '.$item['updated_at'].'</p>
			</div>
		</div>
	 <tr>
	 <p></p>
	 </tr>';
}
 ?>
</div>
<div h class="danhmuc">
		<div class="panel panel-primary">
			<div class="panel-heading">
			</div>
			<div class="panel-body">
				<table style="background: green;" class="table table-bordered table-hover">
					<tbody>
						<?php
						//Lay danh sach danh muc tu database
						$sql          = 'select * from category';
						$categoryList = executeResult($sql);

						//$index = 1;
						foreach ($categoryList as $item) {
							echo '<tr>
										<td><a href="hienthisp.php?id='.$item['id'].'">
										 '.$item['name'].'</td>

									</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</body>
</html>