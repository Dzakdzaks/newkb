<?php 
	include 'server.php';
	$eror		= false;
	if(isset($_POST['id_layanan'])){
	
	$idPasien = $_POST['id_layanan'];
	
	
	$sql = mysql_query("DELETE FROM layanan WHERE id_layanan = '$idPasien'");


		if ($sql) {
	$response['result'] = 1;
	$response['msg'] = "Sukses delete layanan";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal delete layanan";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 ?>