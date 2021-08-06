<?php
	require_once('db/dbhelper.php');
	require_once('utils/utility.php');
	include_once('layouts/header.php');
	$productList = executeResult('select * from products');
?>
<!-- body -->
<style>
	.danhmuc{
		float: left;
	}
	.container{
		float: left;
	}
	.container .row{
		min-height: 700px;
	}
</style>
<title>Quầy thuốc</title>
<form action=""> 
<div>
<div style="width: 30%" class="danhmuc">
<span class="list-group-item" style="color: white; font-size: 17px; background: #80bb35; border-radius: 30px; font-weight: bolder;">DANH MỤC SẢN PHẨM</span>
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
							echo '
										<p><a href="hienthisp.php?id='.$item['id'].'"> '.$item['name'].'</a></p>
									';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<div style="width:50%" class="container">
	<div style="height: 50px;" class="row">
		<?php
			foreach ($productList as $item) {
				echo '<div class="col-md-3 col-6">
						<div><a href="details.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 100px"></a></div>
						<p></p>
						<a href="details.php?id='.$item['id'].'"><p>'.$item['title'].'</p></a>
						<p style="color: red">'.number_format($item['price'], 0, ',', '.').'đ</p>
						<p></p>
						<div><button class="btn btn-success" style="width: 50%; font-size: 10px;" onclick="addToCart('.$item['id'].')"> Add to cart</button></div>
					</div>';
			}
		?>
	</div>
</div>
</div>
</form>
<style>
	div.footer{
		position: absolute; bottom: 0px; 
	}
</style>
<script type="text/javascript">
	function addToCart(id) {
		$.post('api/cookie.php', {
			'action': 'add',
			'id': id,
			'num': 1
		}, function(data) {
			location.reload()
		})
	}
</script>
<div class="footer">
	<?php
	include_once('layouts/footer.php');
?>
</div> 
