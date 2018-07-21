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
		$result=mysql_query("SELECT DISTINCT nama, nama_pos, SUM( CASE WHEN layanan.metode = 'Pil' THEN 1 ELSE 0 END ) AS Pil, SUM( CASE WHEN layanan.metode = 'Suntik' THEN 1 ELSE 0 END ) AS Suntik, SUM( CASE WHEN layanan.metode = 'Kondom' THEN 1 ELSE 0 END ) AS Kondom FROM pasien, layanan, posyandu WHERE pasien.id_pas=layanan.id_pas AND posyandu.id_pos=pasien.id_pos AND posyandu.nama_pos='".$row['nama_pos']."'") or die(mysql_error());

    $mawar = mysql_fetch_assoc($result);
		
    $posyan[$x] = $mawar['nama_pos'];
    $Pil[$x] = $mawar['Pil'];
    $Suntik[$x] = $mawar['Suntik'];
    $Kondom[$x] = $mawar['Kondom'];

	

    $x++;   
	}


	$response['posyandu'] = $posyan;
	$response['jml_pos'] = count($posyan);
	$response['pil'] = $Pil;
	$response['suntik'] = $Suntik;
	$response['kondom'] = $Kondom;
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