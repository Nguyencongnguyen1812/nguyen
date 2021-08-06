<?php
require_once ('C:\xampp\htdocs\cuahangthucung1\admin\product\db\dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id'])) {
					$id = $_POST['id'];

					$sql = 'delete from order_details where id = '.$id;
					execute($sql);
				}
				break;
		}
	}
}