<?php
include 'server.php';

 if (isset($_POST['id_pos']) &&isset($_POST['id_petugas']) && isset($_POST['nama_pos']) && isset($_POST['alamat_pos'])&& isset($_POST['no_telp_pos'])) {
 	    $idPos = $_POST['id_pos'];
 	    $idPet = $_POST['id_petugas'];
	 	$nama = $_POST['nama_pos'];
	 	$alamat = $_POST['alamat_pos'];
	 	$no = $_POST['no_telp_pos'];
	   
$sql = mysql_query("UPDATE posyandu SET id_petugas = '$idPet', nama_pos = '$nama', alamat_pos ='$alamat', no_telp_pos = '$no' WHERE id_pos = '$idPos'")or die(mysql_error());
//variable array
$response = array();
//cek apakah ada data pembeli
if ($sql) {
	 // $response = mysql_fetch_assoc($sql);
	// membuat variable array di dalam array $response
	$response['result'] = 1;
	$response['msg'] = "Sukses edit posyandu";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal edit posyandu";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 

?>