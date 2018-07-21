<?php 
	include 'server.php';
	$eror		= false;
	if(isset($_POST['id_pasien'])){
	
	$idPasien = $_POST['id_pasien'];
	
	
	$sql = mysql_query("DELETE FROM pasien WHERE id_pasien = '$idPasien'");


		if ($sql) {
	$response['result'] = 1;
	$response['msg'] = "Sukses delete pasien";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal delete pasien";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 ?>