<?php
include 'server.php';

 if (isset($_POST['id_pas'])&& isset($_POST['nama_petugas'])&& isset($_POST['tgl_kunjungan'])&& isset($_POST['haid_terakhir'])&& isset($_POST['berat_badan'])&& isset($_POST['tekanan_darah'])&& isset($_POST['sakit_kuning'])&& isset($_POST['pendarahan'])&& isset($_POST['tumor'])&& isset($_POST['hiv_aids'])&& isset($_POST['posisi_rahim'])&& isset($_POST['diabetes'])&& isset($_POST['pembekuan_darah'])&& isset($_POST['ES'])&& isset($_POST['komplikasi'])&& isset($_POST['tgl_kembali'])&& isset($_POST['metode'])&& isset($_POST['status'])) {
 	   

	 	$idPas = $_POST['id_pas'];
	 	$namaPetugas = $_POST['nama_petugas'];
	 	$tglKunjungan = $_POST['tgl_kunjungan'];
	 	$haidTerakhitr = $_POST['haid_terakhir'];
	 	$beratBadan = $_POST['berat_badan'];
	 	$tekananDarah = $_POST['tekanan_darah'];
	 	$sakitKuning = $_POST['sakit_kuning'];
	 	$pendarahan = $_POST['pendarahan'];
	 	$tumor = $_POST['tumor'];
	 	$hivAids = $_POST['hiv_aids'];
	 	$posisiRahim = $_POST['posisi_rahim'];
	 	$diabetes = $_POST['diabetes'];
	 	$pembekuanDarah = $_POST['pembekuan_darah'];
	 	$es = $_POST['ES'];
	 	$komplikasi = $_POST['komplikasi'];
	 	$tglKembali = $_POST['tgl_kembali'];
	 	$metode = $_POST['metode'];
	 	$status = $_POST['status'];

   
$sql = mysql_query('INSERT INTO layanan (id_pas,nama_petugas,tgl_kunjungan,haid_terakhir,berat_badan, tekanan_darah, sakit_kuning, pendarahan, tumor,hiv_aids,posisi_rahim,diabetes,pembekuan_darah,ES,komplikasi,tgl_kembali,metode,status) VALUES ("'.$idPas.'","'.$namaPetugas.'","'.$tglKunjungan.'","'.$haidTerakhitr.'","'.$beratBadan.'","'.$tekananDarah.'","'.$sakitKuning.'","'.$pendarahan.'","'.$tumor.'","'.$hivAids.'","'.$posisiRahim.'","'.$diabetes.'","'.$pembekuanDarah.'","'.$es.'","'.$komplikasi.'","'.$tglKembali.'","'.$metode.'","'.$status.'")');

//variable array
$response = array();
//cek apakah ada data pembeli
if ($sql) {
	 // $response = mysql_fetch_assoc($sql);
	// membuat variable array di dalam array $response
	$response['result'] = 1;
	$response['msg'] = "Sukses add layanan";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal add layanan";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 

?>