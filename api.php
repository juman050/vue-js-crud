<?php 
	$conn = new mysqli("localhost","root","","vuejs_crud");
	if ($conn->connect_error) {
		die('Could not connect to database');
	}

	$res = array('error' => false );

	$action = "read";
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}

	if ($action == 'read') {
		$result = $conn->query("SELECT * FROM users");
		$users = array();
		while ($row = $result->fetch_assoc()) {
			array_push($users, $row);
		}
		$res['users'] = $users;
	}

	if($action == 'create'){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];

		$result = $conn->query("INSERT INTO `users` (`name`, `email`, `address`) VALUES ('$name', '$email', '$address') ");
		
		if($result){
			$res['message'] = "User added successfully";
		} else{
			$res['error'] = true;
			$res['message'] = "Could not insert user";
		}
	}

	if($action == 'update'){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];

		$result = $conn->query("UPDATE `users` SET `name` = '$name', `email` = '$email', `address` = '$address' WHERE `id` = '$id'");
		
		if($result){
			$res['message'] = "User updated successfully";
		} else{
			$res['error'] = true;
			$res['message'] = "Could not update user";
		}

	}

	if($action == 'delete'){
		$id = $_POST['id'];
		
		$result = $conn->query("DELETE FROM `users` WHERE `id` = '$id'");
		
		if($result){
			$res['message'] = "User deleted successfully";
		} else{
			$res['error'] = true;
			$res['message'] = "Could not delete user";
		}

	}

	$conn->close();

	header("Content-type: application/json");
	echo json_encode($res);
	die();

?>