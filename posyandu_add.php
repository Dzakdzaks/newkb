<?php
include 'server.php';

 if (isset($_POST['id_petugas']) && isset($_POST['nama_pos'])&& isset($_POST['alamat_pos'])&& isset($_POST['no_telp_pos'])) {
 	   
 	    $idPet = $_POST['id_petugas'];
	 	$nama = $_POST['nama_pos'];
	 	$alamat = $_POST['alamat_pos'];
	 	$no = $_POST['no_telp_pos'];
	 	
 	   
$sql = mysql_query('INSERT INTO posyandu (id_petugas,nama_pos,alamat_pos,no_telp_pos) VALUES ("'.$idPet.'","'.$nama.'","'.$alamat.'","'.$no.'")');

//variable array
$response = array();
//cek apakah ada data pembeli
if ($sql) {
	 // $response = mysql_fetch_assoc($sql);
	// membuat variable array di dalam array $response
	$response['result'] = 1;
	$response['msg'] = "Sukses add posyandu";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal add posyandu";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 

?>