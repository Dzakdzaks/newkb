<?php 
	include "server.php";

	$nama = $_POST['keyword'];

	$query = mysql_query("SELECT * FROM pasien INNER JOIN posyandu ON pasien.id_pos=posyandu.id_pos WHERE nama LIKE '%".$nama."%'");

	$num_rows = mysql_num_rows($query);

	if ($num_rows > 0){
		$json = '{"value":1, "resultsproduk": [';

		while ($row = mysql_fetch_array($query)){
			$char ='"';

			$json .= '{
				"id_pas": "'.str_replace($char,'`',strip_tags($row['id_pas'])).'", 
				"id_pasien": "'.str_replace($char,'`',strip_tags($row['id_pasien'])).'",
				"id_pos": "'.str_replace($char,'`',strip_tags($row['id_pos'])).'",
				"nama": "'.str_replace($char,'`',strip_tags($row['nama'])).'",
				"nama_pos": "'.str_replace($char,'`',strip_tags($row['nama_pos'])).'",
				"no_telp": "'.str_replace($char,'`',strip_tags($row['no_telp'])).'",
				"tgl_lahir": "'.str_replace($char,'`',strip_tags($row['tgl_lahir'])).'",
				"umur": "'.str_replace($char,'`',strip_tags($row['umur'])).'",
				"alamat": "'.str_replace($char,'`',strip_tags($row['alamat'])).'",
				"pendidikan": "'.str_replace($char,'`',strip_tags($row['pendidikan'])).'",
				"pekerjaan": "'.str_replace($char,'`',strip_tags($row['pekerjaan'])).'",
				"jumlah_anak": "'.str_replace($char,'`',strip_tags($row['jumlah_anak'])).'",
				"hamil": "'.str_replace($char,'`',strip_tags($row['hamil'])).'",
				"gakin": "'.str_replace($char,'`',strip_tags($row['gakin'])).'",
				"pus4t": "'.str_replace($char,'`',strip_tags($row['pus4t'])).'",
				"metode": "'.str_replace($char,'`',strip_tags($row['metode'])).'"
			},';
		}

		$json = substr($json,0,strlen($json)-1);
		
		$json .= ']}';

	} else {
		$json = '{"value":0, "message": "Data tidak ditemukan."}';
	}

	echo $json;

?>
