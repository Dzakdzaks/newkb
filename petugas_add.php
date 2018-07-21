<?php
include 'server.php';

 if (isset($_POST['id_posyandu']) && isset($_POST['nama'])&& isset($_POST['nip'])&& isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['alamat'])&& isset($_POST['nomor_telpon'])) {
 	   

 	    $idPos = $_POST['id_posyandu'];
	 	$nama = $_POST['nama'];
	 	$nip = $_POST['nip'];
	 	$uName = $_POST['username'];
	 	$pass = $_POST['password'];
	 	$alamat = $_POST['alamat'];
	 	$no = $_POST['nomor_telpon'];
	 	$idRole = 2;


 	   
$sql = mysql_query('INSERT INTO users (id_posyandu,nama,nip,username,password,alamat,nomor_telpon,id_role) VALUES ("'.$idPos.'","'.$nama.'","'.$nip.'","'.$uName.'","'.$pass.'","'.$alamat.'","'.$no.'","'.$idRole.'")');

//variable array
$response = array();
//cek apakah ada data pembeli
if ($sql) {
	 // $response = mysql_fetch_assoc($sql);
	// membuat variable array di dalam array $response
	$response['result'] = 1;
	$response['msg'] = "Sukses add petugas";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal add petugas";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 

?>