<?php
include 'server.php';
$nama_pas = isset($_POST['nama_pas']) ? $_POST['nama_pas'] : '';
 if ($nama_pas=="$nama_pas") {
// perintah untuk menampilkan semua data pembeli dari table pembeli
$sql=mysql_query("SELECT pasien.*,layanan.* FROM pasien,layanan WHERE pasien.id_pas=layanan.id_pas AND nama='$nama_pas' HAVING COUNT(nama) >= 1") or die(mysql_error());

//variable array
$response = array();
//cek apakah ada data pembeli
if (mysql_num_rows($sql)>0) {
	// membuat variable array di dalam array $response
	$response['laporankartu'] = array();
	// loping data pembeli
	while ($row = mysql_fetch_array($sql)) {
		//membuat variable array untuk menampung data pembeli sementara sebelum di masukan kedalam array response dan di jadkan data json
		$data = array();		
		$data['id_pasien'] = $row['id_pasien'];				
		$data['nama'] = $row['nama'];				
		$data['umur'] = $row['umur'];				
		$data['alamat'] = $row['alamat'];				
		$data['pendidikan'] = $row['pendidikan'];				
		$data['pekerjaan'] = $row['pekerjaan'];				
		$data['jumlah_anak'] = $row['jumlah_anak'];				
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
		$data['hamil'] = $row['hamil'];			
		//akhir dari memasukan data kedalam array $data
		array_push($response['laporankartu'],$data);
	}
	$response['result'] = 1;
	$response['msg'] = "semua laporankartu";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "Tidak ada laporankartu";
	echo json_encode($response);
} 
} 

	
?>