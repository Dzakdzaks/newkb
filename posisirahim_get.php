<?php
include 'server.php';

 if (isset($_POST['id_users'])) {
 	    $id = $_POST['id_users'];
 	 
// perintah untuk menampilkan semua data pembeli dari table pembeli
$sql = mysql_query("SELECT * FROM posisirahim ORDER BY id_posisi DESC")or die(mysql_error());
//variable array
$response = array();
//cek apakah ada data pembeli
if (mysql_num_rows($sql)>0) {
	// membuat variable array di dalam array $response
	$response['posisirahim'] = array();
	// loping data pembeli
	while ($row = mysql_fetch_array($sql)) {
		//membuat variable array untuk menampung data pembeli sementara sebelum di masukan kedalam array response dan di jadkan data json
		$data = array();
		$data['id_posisi'] = $row['id_posisi'];
		$data['nama_posisi'] = $row['nama_posisi'];
		
		//akhir dari memasukan data kedalam array $data
		array_push($response['posisirahim'],$data);
	}
	$response['result'] = 1;
	$response['msg'] = "semua posisirahim";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "Tidak ada posisirahim";
	echo json_encode($response);
} 
} 

	
?>