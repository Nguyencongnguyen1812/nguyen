<?php
require_once ('C:\xampp\htdocs\cuahangthucung1\admin\product\db\dbhelper.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Sản Phẩm</title>
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
	    <a class="nav-link" href="../category/">Quản Lý Danh Mục</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " href="../product/">Quản Lý Sản Phẩm</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Thông Tin Đơn Hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " href="../oderdetal/tongdon.php">Tổng doanh thu</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thông Tin Người Mua</h2>
			</div>
			<div class="panel-body">
				<a href="../oderdetal/tongdon.php">
					<button  class="btn btn-success" style="margin-bottom: 15px;">Tổng đơn hàng</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên</th>
							<th>SDT</th>
							<th>email</th>
							<th>Địa Chỉ</th>
							<th>Ngày order</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach danh muc tu database
$sql          = 'select * from orders';
$ordersList = executeResult($sql);

$index = 1;
foreach ($ordersList as $item) {
	echo '<tr>
				<td>'.($index++).'</td>
				<td><a href="../oderdetal/index.php?id='.$item['id'].'">'.$item['fullname'].'</td>
				<td>'.$item['phone_number'].'</td>
				<td>'.$item['email'].'</td>
				<td>'.$item['address'].'</td>
				<td>'.$item['order_date'].'</td>
				<td>
					<button class="btn btn-danger" onclick="deleteoders('.$item['id'].')">Xoá</button>
				</td>
			</tr>';
}

?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteoders(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
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