<?php
include 'server.php';

 if (isset($_POST['id_users'])) {
 	    $id = $_POST['id_users'];
 	
// perintah untuk menampilkan semua data pembeli dari table pembeli
	$posyandu=mysql_query("SELECT nama_pos FROM posyandu order by nama_pos desc");
	$x = 0;
	$POS = [];	
//cek apakah ada data pembeli
if (mysql_num_rows($posyandu)>0) {
	while ($row = mysql_fetch_array($posyandu)) {
    	$POS[]=$row;
		$result=mysql_query("SELECT DISTINCT nama, nama_pos, SUM( CASE WHEN status = 'KB Aktif' THEN 1 ELSE 0 END ) AS KB_Aktif, SUM( CASE WHEN status = 'KB Pasca Persalinan' THEN 1 ELSE 0 END ) AS KB_Pasca_Persalinan, SUM( CASE WHEN status = 'PUS 4T BerKB' THEN 1 ELSE 0 END ) AS PUS_4T_BerKB FROM pasien, layanan, posyandu WHERE pasien.id_pas=layanan.id_pas AND posyandu.id_pos=pasien.id_pos AND posyandu.nama_pos='".$row['nama_pos']."'") or die(mysql_error());

    $mawar = mysql_fetch_assoc($result);
		
    $posyan[$x] = $mawar['nama_pos'];
    $KB_Aktif[$x] = $mawar['KB_Aktif'];
    $KB_Pasca_Persalinan[$x] = $mawar['KB_Pasca_Persalinan'];
    $PUS_4T_BerKB[$x] = $mawar['PUS_4T_BerKB'];

	

    $x++;   
	}


	$response['posyandu'] = $posyan;
	$response['jml_pos'] = count($posyan);
	$response['kb_aktif'] = $KB_Aktif;
	$response['kb_pasca_persalinan'] = $KB_Pasca_Persalinan;
	$response['pus_4t_berkb'] = $PUS_4T_BerKB;
	$response['result'] = 1;
	$response['msg'] = "semua data grafik";
	echo json_encode($response);

}else{
	$response['result'] = 0;
	$response['msg'] = "Tidak data grafik";
	echo json_encode($response);
} 
} 

	
?>