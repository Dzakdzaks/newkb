<?php 
	include 'server.php';
	$eror		= false;
	if(isset($_POST['id_users'])){
	
	$idPasien = $_POST['id_users'];
	
	
	$sql = mysql_query("DELETE FROM users WHERE id_users = '$idPasien'");


		if ($sql) {
	$response['result'] = 1;
	$response['msg'] = "Sukses delete petugas";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal delete petugas";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 ?>