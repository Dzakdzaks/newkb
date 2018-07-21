<?php
include 'server.php';

 if (isset($_POST['id_users'])) {
 	    $id = $_POST['id_users'];
 	 
// perintah untuk menampilkan semua data pembeli dari table pembeli
$sql = mysql_query("SELECT layanan.*,pasien.*,posyandu.*,users.*, pasien.nama AS nama_pasien, users.nama AS nama_petugas FROM layanan INNER JOIN pasien ON layanan.id_pas=pasien.id_pas INNER JOIN posyandu ON pasien.id_pos=posyandu.id_pos INNER JOIN users ON posyandu.id_petugas=users.id_users WHERE posyandu.id_pos = '$id' ORDER BY id_layanan DESC")or die(mysql_error());

//variable array
$response = array();
//cek apakah ada data pembeli
if (mysql_num_rows($sql)>0) {
	// membuat variable array di dalam array $response
	$response['layanan'] = array();
	// loping data pembeli
	while ($row = mysql_fetch_array($sql)) {
		//membuat variable array untuk menampung data pembeli sementara sebelum di masukan kedalam array response dan di jadkan data json
		$data = array();
		$data['id_layanan'] = $row['id_layanan'];		
		$data['id_pas'] = $row['id_pas'];		
		$data['id_pos'] = $row['id_pos'];		
		$data['nama'] = $row['nama_pasien'];			
		$data['nama_pos'] = $row['nama_pos'];			
		$data['nama_pet'] = $row['nama_petugas'];			
		$data['tgl_kunjungan'] = $row['tgl_kunjungan'];	
		$data['tgl_kembali'] = $row['tgl_kembali'];			
		$data['haid_terakhir'] = $row['haid_terakhir'];			
		$data['berat_badan'] = $row['berat_badan'];			
		$data['tekanan_darah'] = $row['tekanan_darah'];			
		$data['sakit_kuning'] = $row['sakit_kuning'];			
		$data['pendarahan'] = $row['pendarahan'];			
		$data['tumor'] = $row['tumor'];			
		$data['hiv_aids'] = $row['hiv_aids'];			
		$data['posisi_rahim'] = $row['posisi_rahim'];			
		$data['diabetes'] = $row['diabetes'];			
		$data['ES'] = $row['ES'];			
		$data['komplikasi'] = $row['komplikasi'];			
		$data['pembekuan_darah'] = $row['pembekuan_darah'];			
		$data['metode'] = $row['metode'];			
		$data['status'] = $row['status'];			
		//akhir dari memasukan data kedalam array $data
		array_push($response['layanan'],$data);
	}
	$response['result'] = 1;
	$response['msg'] = "semua layanan";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "Tidak ada layanan";
	echo json_encode($response);
} 
} 

	
?>