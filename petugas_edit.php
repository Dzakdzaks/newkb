<?php
include 'server.php';

 if (isset($_POST['id_users']) &&isset($_POST['id_posyandu']) && isset($_POST['nama']) && isset($_POST['nip'])&& isset($_POST['alamat'])&& isset($_POST['nomor_telpon'])&& isset($_POST['username'])&& isset($_POST['password'])) {
 	    $idUsers = $_POST['id_users'];
 	    $idPos = $_POST['id_posyandu'];
	 	$nama = $_POST['nama'];
	 	$nip = $_POST['nip'];
	 	$alamat = $_POST['alamat'];
	 	$no = $_POST['nomor_telpon'];
	 	$uname = $_POST['username'];
	 	$pass = $_POST['password'];
	   
$sql = mysql_query("UPDATE users SET id_posyandu = '$idPos', nama = '$nama', nip ='$nip', alamat = '$alamat', nomor_telpon = '$no', username = '$uname', password = '$pass' WHERE id_users = '$idUsers'")or die(mysql_error());
//variable array
$response = array();
//cek apakah ada data pembeli
if ($sql) {
	 // $response = mysql_fetch_assoc($sql);
	// membuat variable array di dalam array $response
	$response['result'] = 1;
	$response['msg'] = "Sukses edit petugas";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal edit petugas";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 

?>