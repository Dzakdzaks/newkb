<?php
include 'server.php';

 if (isset($_POST['id_pasien']) && isset($_POST['id_pos']) && isset($_POST['nama'])&& isset($_POST['no_telp'])&& isset($_POST['tgl_lahir'])&& isset($_POST['umur']) && isset($_POST['alamat'])&& isset($_POST['pendidikan'])&& isset($_POST['pekerjaan'])&& isset($_POST['jumlah_anak'])&& isset($_POST['hamil'])&& isset($_POST['gakin'])&& isset($_POST['pus4t'])&& isset($_POST['metode'])) {
 	    $idPasien = $_POST['id_pasien'];
 	    $idPos = $_POST['id_pos'];
	 	$nama = $_POST['nama'];
	 	$no = $_POST['no_telp'];
	 	$bday = $_POST['tgl_lahir'];
	 	$age = $_POST['umur'];
	 	$alamat = $_POST['alamat'];
	 	$pend = $_POST['pendidikan'];
	 	$pek = $_POST['pekerjaan'];
	 	$jml_ank = $_POST['jumlah_anak'];
	 	$hml = $_POST['hamil'];
	 	$gak = $_POST['gakin'];
	 	$pus = $_POST['pus4t'];
	 	$metode = $_POST['metode'];
 	   
$sql = mysql_query("UPDATE pasien SET id_pasien = '$idPasien', id_pos = '$idPos', nama = '$nama', no_telp ='$no', tgl_lahir ='$bday', umur ='$age', alamat ='$alamat', pendidikan ='$pend', pekerjaan ='$pek', jumlah_anak ='$jml_ank', hamil ='$hml', gakin ='$gak', pus4t ='$pus', metode ='$metode'  WHERE id_pasien = '$idPasien'")or die(mysql_error());
//variable array
$response = array();
//cek apakah ada data pembeli
if ($sql) {
	 // $response = mysql_fetch_assoc($sql);
	// membuat variable array di dalam array $response
	$response['result'] = 1;
	$response['msg'] = "Sukses edit pasien";
	echo json_encode($response);
}else{
	$response['result'] = 0;
	$response['msg'] = "gagal edit pasien";
	echo json_encode($response);
}
}else {
	$response['result'] = 0;
	$response['msg'] = "Paremeter Salah";
	echo json_encode($response);
}
 

?>