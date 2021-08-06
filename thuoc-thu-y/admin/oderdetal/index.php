<?php
require_once ('C:\xampp\htdocs\cuahangthucung1\admin\product\db\dbhelper.php');
// $id ='';
// if (isset($_GET['id'])) {
// 	$id       = $_GET['id'];
// 	$sql      = 'select * from orders where id = '.$id;
// 	$category = executeSingleResult($sql);
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Danh Mục</title>
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
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link " href="#">Quản Lý Danh Mục</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " href="../product/">Quản Lý Sản Phẩm</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " href="../oder/">Thông Tin Khách Hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Chi Tiết Đơn Hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " href="../oderdetal/tongdon.php">Tổng doanh thu</a>
	  </li>
	</ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Đơn hàng</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Danh Mục</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>mã đơn hàng</th>
							<th> Tên thuốc</th>
							<th> giá</th>
							<th>Số lượng</th>
							<th> loại thuốc</th>
							<th>....</th>
						</tr>
					</thead>
					<tbody>
<?php
$id ='';
if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from orders where id = '.$id;
	$category = executeSingleResult($sql);
}
//Lay danh sach danh muc tu database
$sql= "select * from ((order_details inner join products on products.id= order_details.product_id ) inner join orders on orders.id= order_details.order_id) where orders.id = ".$id;
$productList = executeResult($sql);
$index = 1;
$Totla =0;
foreach ($productList as $item) {
	$Totla = $Totla + $item['price'];
	echo '<tr>
				<td>'.($index++).'</td>
				<td>'.$item['order_id'].'</td>
				<td>'.$item['title'].'</td>
				<td> '.number_format($item['price'], 0, ',', '.').'đ</td>
				<td>'.$item['num'].'</td>
				<td>'.$item['id_category'].'</td>
				<td>
					<a href="></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteorderdetal('.$item['id'].')">Xoá</button>
				</td>
			</tr>';

}				
echo ' tổng:  '.number_format($Totla, 0, ',', '.').'đ ';
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function deleteorderdetal(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>