<?php 
	include 'server.php';
	$eror		= false;
	if(isset($_POST['simpan'])){
	//$id_info = $_POST['id_info'];
	$idPos = $_POST['id_pos'];
	$nama = $_POST['nama'];
	$nip = $_POST['nip'];
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$alamat = $_POST['alamat'];
	$no = $_POST['nomor_telpon'];
	$role = $_POST['id_role'];
	
	$reg = mysql_query('INSERT INTO users (id_posyandu,nama,nip,username,password,alamat,nomor_telpon,id_role)
				 values ("'.$idPos.'","'.$nama.'","'.$nip.'","'.$uname.'","'.$pass.'","'.$alamat.'","'.$no.'","'.$role.'")');


			if($reg){
				//catat nama file ke database
				echo '<p>Data berhasil disimpan</p>';
				echo '<p><a href="users_form_reg.php">Kembali</a></p>';
			} else{
				echo '<p>Data gagal disimpan</p>';
				echo '<p><a href="users_form_reg.php">Kembali</a></p>';
			}
		}
 ?>