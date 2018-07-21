<?php
include 'server.php';

 if (isset($_POST['id_users'])) {
 	    $id = $_POST['id_users'];
 	 
// perintah untuk menampilkan semua data pembeli dari table pembeli
$sql = mysql_query("SELECT * FROM metode ORDER BY id_metode DESC")or die(mysql_error());
//variable array
$response = array();
//cek apakah ada data pembeli
if (mysql_num_rows($sql)>0) {
	// membuat variable array di dalam array $response
	$response['metode'] = array();
	// loping data pembeli
	while ($row = mysql_fetch_array($sql)) {
		//membuat variable array untuk menampung data pembeli sementara sebelum di masukan kedalam array response dan di jadkan data json
		$data = array();
		$data['id_metode'] = $row['id_metode'];
		$data['nama_metode'] = $row['nama_metode'];
		
		//akhir dari memasukan data kedalam array $data
		array_push($response['metode'],$data);
	}
	$response['result'] = 1;
	$response['msg'] = "semua metode";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "Tidak ada metode";
	echo json_encode($response);
} 
} 

	
?>