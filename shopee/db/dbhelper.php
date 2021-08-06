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
function executeResult($sql) {
	//Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');
	
	//query
	$resultset = mysqli_query($conn, $sql);
	if(!$resultset){ die('LỖI'. mysqli_error($conn));}
	$list = [];
	//$num=mysqli_num_rows($resultset);
	//echo $num;

		while (($row =mysqli_fetch_array($resultset))!= NULL)
		{
		$list[] = $row;
		print_r($list['title']) ;
		}		
	//Dong ket noi
	mysqli_close($conn);

	return $list;
}

$sql = 'select * from products';
$List= executeResult($sql);
foreach($List as $row)
{
	echo '<h2>'.$row['title'].'</h2>';
}
	

?>