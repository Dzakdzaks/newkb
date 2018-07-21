<?php
// require_once 'include/DB_Functions.php';
// $db = new DB_Functions();
include 'server.php';
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // menerima parameter POST ( email dan password )
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // get the user by email and password
    // get user berdasarkan email dan password

    // $user = $db->getUserByEmailAndPassword($username, $password);

    $user = mysql_query("SELECT users.*, role.* FROM users, role WHERE users.id_role=role.id_role AND username = '$username' AND password = '$password'");
 
   
        if (mysql_num_rows($user) == 1 ) {
            $row = mysql_fetch_assoc($user);
        // user ditemukan
        $response["error"] = FALSE;
        // $response["uid"] = $user["unique_id"];
        $response["users"]["id_users"] = $row["id_users"];
        $response["users"]["id_pos"] = $row["id_posyandu"];
        $response["users"]["id_role"] = $row["id_role"];
        $response["users"]["nama_role"] = $row["nama_role"];
        $response["users"]["nama"] = $row["nama"];
        $response["users"]["nip"] = $row["nip"];
        $response["users"]["username"] = $row["username"];
        $response["users"]["password"] = $row["password"];
        $response["users"]["alamat"] = $row["alamat"];
        $response["users"]["nomor_telpon"] = $row["nomor_telpon"];
        echo json_encode($response);
        } else{
            $response['error'] = TRUE;
            $response["error_msg"] = "Login gagal. Password/Email salah";
        echo json_encode($response);
        }
  
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Parameter (email atau password) ada yang kurang";
    echo json_encode($response);
}
?>