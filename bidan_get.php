<?php
include 'server.php';

 if (isset($_POST['id_users'])) {
 	    $id = $_POST['id_users'];
 	 
// perintah untuk menampilkan semua data pembeli dari table pembeli
$sql = mysql_query("SELECT * FROM users WHERE id_role = 3 ORDER BY id_users DESC")or die(mysql_error());
//variable array
$response = array();
//cek apakah ada data pembeli
if (mysql_num_rows($sql)>0) {
	// membuat variable array di dalam array $response
	$response['users'] = array();
	// loping data pembeli
	while ($row = mysql_fetch_array($sql)) {
		//membuat variable array untuk menampung data pembeli sementara sebelum di masukan kedalam array response dan di jadkan data json
		$data = array();
		$data['id_users'] = $row['id_users'];
		$data['id_posyandu'] = $row['id_posyandu'];
		$data['id_role'] = $row['id_role'];
		$data['nama'] = $row['nama'];
		$data['nip'] = $row['nip'];
		$data['username'] = $row['username'];
		$data['password'] = $row['password'];
		$data['alamat'] = $row['alamat'];
		$data['nomor_telpon'] = $row['nomor_telpon'];
		
		//akhir dari memasukan data kedalam array $data
		array_push($response['users'],$data);
	}
	$response['result'] = 1;
	$response['msg'] = "semua users";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "Tidak ada users";
	echo json_encode($response);
} 
} 

	
?>