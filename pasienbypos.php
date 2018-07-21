<?php
include 'server.php';

 if (isset($_POST['id_users']) && isset($_POST['id_pos'])) {
 	    $id = $_POST['id_users'];
 	    $idPos = $_POST['id_pos'];
 	 
// perintah untuk menampilkan semua data pembeli dari table pembeli
$sql = mysql_query("SELECT pasien.*,posyandu.* FROM pasien INNER JOIN posyandu ON pasien.id_pos=posyandu.id_pos WHERE pasien.id_pos ='$idPos' ORDER BY id_pasien DESC")or die(mysql_error());
//variable array
$response = array();
//cek apakah ada data pembeli
if (mysql_num_rows($sql)>0) {
	// membuat variable array di dalam array $response
	$response['pasienbypos'] = array();
	// loping data pembeli
	while ($row = mysql_fetch_array($sql)) {
		//membuat variable array untuk menampung data pembeli sementara sebelum di masukan kedalam array response dan di jadkan data json
		$data = array();
		$data['id_pas'] = $row['id_pas'];
		$data['id_pasien'] = $row['id_pasien'];
		$data['id_pos'] = $row['id_pos'];
		$data['nama_pos'] = $row['nama_pos'];
		$data['nama'] = $row['nama'];
		$data['no_telp'] = $row['no_telp'];
		$data['tgl_lahir'] = $row['tgl_lahir'];
		$data['umur'] = $row['umur'];
		$data['alamat'] = $row['alamat'];
		$data['pendidikan'] = $row['pendidikan'];
		$data['pekerjaan'] = $row['pekerjaan'];
		$data['jumlah_anak'] = $row['jumlah_anak'];
		$data['hamil'] = $row['hamil'];
		$data['gakin'] = $row['gakin'];
		$data['pus4t'] = $row['pus4t'];
		$data['metode'] = $row['metode'];
		
		//akhir dari memasukan data kedalam array $data
		array_push($response['pasienbypos'],$data);
	}
	$response['result'] = 1;
	$response['msg'] = "semua pasienbypos";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "Tidak ada pasienbypos";
	echo json_encode($response);
} 
} 

	
?>