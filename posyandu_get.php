<?php
include 'server.php';

 if (isset($_POST['id_users'])) {
 	    $id = $_POST['id_users'];
 	 
// perintah untuk menampilkan semua data pembeli dari table pembeli
// $sql = mysql_query("SELECT * FROM posyandu ORDER BY id_pos DESC")or die(mysql_error());
 			$sql = mysql_query("SELECT posyandu.*, users.* FROM posyandu,users WHERE posyandu.id_petugas = users.id_users && posyandu.id_petugas ORDER BY id_pos DESC") or die(mysql_error());
//variable $arrayName = array('' => , );
$response = array();
//cek apakah ada data pembeli
if (mysql_num_rows($sql)>0) {
	// membuat variable array di dalam array $response
	$response['posyandu'] = array();
	// loping data pembeli
	while ($row = mysql_fetch_array($sql)) {
		//membuat variable array untuk menampung data pembeli sementara sebelum di masukan kedalam array response dan di jadkan data json
		$data = array();
		$data['id_pos'] = $row['id_pos'];
		$data['id_petugas'] = $row['id_petugas'];
		$data['nama'] = $row['nama'];
		$data['nama_pos'] = $row['nama_pos'];
		$data['nama_pos'] = $row['nama_pos'];
		$data['alamat_pos'] = $row['alamat_pos'];
		$data['no_telp_pos'] = $row['no_telp_pos'];
		
		//akhir dari memasukan data kedalam array $data
		array_push($response['posyandu'],$data);
	}
	$response['result'] = 1;
	$response['msg'] = "semua posyandu";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "Tidak ada posyandu";
	echo json_encode($response);
} 
} 

	
?>