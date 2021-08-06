<?php
require_once('config.php');

/**
* Su dung cho cac lenh: insert, update, delete
*/
function execute($sql) {
	//Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	mysqli_query($conn, $sql);

	//Dong ket noi
	mysqli_close($conn);
}

/**
* Su dung cho cac lenh: select
*/
function executeResult($sql, $onlyOne = false) {
	//Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	$resultset = mysqli_query($conn, $sql);

	if($onlyOne) {
		$data = mysqli_fetch_array($resultset, 1);
	} else {
		$data = [];
		while(($row = mysqli_fetch_array($resultset, 1)) != null) {
			$data[] = $row;
		}
	}
	//Dong ket noi
	mysqli_close($conn);

	return $data;
}
?>
<html>
    <h2>helo </h2>
</html>

<div class="table">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Số lượng</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

<?php
 $sql = 'select * from products';
 $List = executeResult($sql);
foreach ( $List as $item) {
    echo '<tr>
         <td>'.$item['price'].'</td>
         <td>'.$item['title'].'</td>
    </tr>';
    }
?>
                  
                </tbody>
            </table>
        </div>
    </div>