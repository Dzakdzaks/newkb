<?php
include 'server.php';

 if (isset($_POST['tahun']) && isset($_POST['bulan'])) {
        $years = $_POST['tahun'];
        $month = $_POST['bulan'];
    
// perintah untuk menampilkan semua data pembeli dari table pembeli
        $posyandu=mysql_query("SELECT nama_pos FROM posyandu order by nama_pos desc");
        $x = 0;
        $POS = []; 
//cek apakah ada data pembeli
if (mysql_num_rows($posyandu)>0) {
   while ($nama = mysql_fetch_assoc($posyandu)) {
    $POS[]=$nama;
    $result=mysql_query("SELECT posyandu.nama_pos, layanan.status, layanan.tgl_kunjungan,
    SUM( CASE WHEN layanan.metode = 'Kondom' THEN 1 ELSE 0 END ) AS Kondom,
    SUM( CASE WHEN layanan.metode = 'Pil' THEN 1 ELSE 0 END ) AS Pil,
    SUM( CASE WHEN layanan.metode = 'Suntik' THEN 1 ELSE 0 END ) AS Suntik
    FROM posyandu INNER JOIN pasien ON posyandu.id_pos=pasien.id_pos JOIN layanan on layanan.id_pas=pasien.id_pas
    AND posyandu.nama_pos='".$nama['nama_pos']."' AND status='KB Aktif' AND YEAR(tgl_kunjungan) = '$years' AND month(tgl_kunjungan) = '$month'") or die(mysql_error());

//For each row, add the field to the corresponding column
    $row = mysql_fetch_assoc($result);
     $nama_pos[$x] = $row["nama_pos"];
    $Kondom[$x]   = $row["Kondom"];
    $Pil[$x]      = $row["Pil"];
    $Suntik[$x]   = $row["Suntik"];
    $x++;
}

//STATUS
$posyandu2=mysql_query("SELECT nama_pos FROM posyandu order by nama_pos desc");
// $id_pos = isset($_GET['id_pos']) ? $_GET['id_pos'] : '';
$z = 0;
$POS2 = [];
while ($nama2 = mysql_fetch_assoc($posyandu2)) {
    $POS2[]=$nama2;
$status=mysql_query("SELECT posyandu.nama_pos, SUM( CASE WHEN status = 'KB Aktif' THEN 1 ELSE 0 END ) AS KB_Aktif, SUM( CASE WHEN status = 'KB Pasca Persalinan' THEN 1 ELSE 0 END ) AS KB_Pasca_Persalinan, SUM( CASE WHEN status = 'PUS 4T BerKB' THEN 1 ELSE 0 END ) AS PUS_4T_BerKB FROM layanan left join pasien on layanan.id_pas = pasien.id_pas JOIN posyandu ON posyandu.id_pos = pasien.id_pos
    AND nama_pos='".$nama2['nama_pos']."' AND YEAR(tgl_kunjungan) = '$years' AND month(tgl_kunjungan) = '$month' GROUP BY nama_pos") or die(mysql_error());
// layanan  where id_pos=8
//For each row, add the field to the corresponding column
    $stat = mysql_fetch_assoc($status);

    $KB_Aktif[$z]              = $stat["KB_Aktif"];
    $KB_Pasca_Persalinan[$z]   = $stat["KB_Pasca_Persalinan"];
    $PUS_4T_BerKB[$z]          = $stat["PUS_4T_BerKB"];

    $z++;
}

//PASCA
$posyandu1=mysql_query("SELECT nama_pos FROM posyandu order by nama_pos desc");
$y = 0;
$POS1 = [];
while ($nama1 = mysql_fetch_assoc($posyandu1)) {
    $POS1[]=$nama1;
    $result1=mysql_query("SELECT posyandu.nama_pos, layanan.status,
    SUM( CASE WHEN layanan.metode = 'Kondom' THEN 1 ELSE 0 END ) AS Kondom1,
    SUM( CASE WHEN layanan.metode = 'Pil' THEN 1 ELSE 0 END ) AS Pil1,
    SUM( CASE WHEN layanan.metode = 'Suntik' THEN 1 ELSE 0 END ) AS Suntik1
    FROM posyandu INNER JOIN pasien ON posyandu.id_pos=pasien.id_pos JOIN layanan on layanan.id_pas=pasien.id_pas
    AND posyandu.nama_pos='".$nama1['nama_pos']."' AND status='KB Pasca Persalinan' AND YEAR(tgl_kunjungan) = '$years' AND month(tgl_kunjungan) = '$month'") or die(mysql_error());

//For each row, add the field to the corresponding column
    $row1 = mysql_fetch_assoc($result1);

//    $nama_pos = $row["nama_pos"];
    $Kondom1[$y]   = $row1["Kondom1"];
    $Pil1[$y]      = $row1["Pil1"];
    $Suntik1[$y]   = $row1["Suntik1"];


    $y++;
}

    

    $response['posyandu'] = $nama_pos;
    $response['jml_pos'] = count($nama_pos);
    $response['Kondom'] = $Kondom;
    $response['Pil'] = $Pil;
    $response['Suntik'] = $Suntik;
    $response['KB_Aktif'] = $KB_Aktif;
    $response['KB_Pasca_Persalinan'] = $KB_Pasca_Persalinan;
    $response['PUS_4T_BerKB'] = $PUS_4T_BerKB;
     $response['Kondom1'] = $Kondom1;
    $response['Pil1'] = $Pil1;
    $response['Suntik1'] = $Suntik1;
    $response['result'] = 1;
    $response['msg'] = "semua data laporan layanan";
    echo json_encode($response);

}else{
    $response['result'] = 0;
    $response['msg'] = "Tidak ada data laporan layanan";
    echo json_encode($response);
} 
} 

    
?>