<?php 
	include 'server.php';
	$eror		= false;
	if(isset($_POST['id_pos'])){
	
	$idPos = $_POST['id_pos'];
	
	
	$sql = mysql_query("DELETE FROM posyandu WHERE id_pos = '$idPos'");


		if ($sql) {
	$response['result'] = 1;
	$response['msg'] = "Sukses delete posyandu";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal delete posyandu";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 ?>