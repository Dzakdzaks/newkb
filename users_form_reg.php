<!DOCTYPE html>
<?php include 'server.php'; include 'users_register.php'; ?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
</head>

<body>
    <form action="users_register.php" method="post" enctype="multipart/form-data">
        <table class="table" cellpadding="0" cellspacing="0" align="center">
            <tr>
                <td width="100">Nama</td>
                <td>
                    <input type="text" name="nama" />
                </td>
            </tr>
             <tr>
                <td width="100">Posyandu</td>
                <td>
                    <select name="id_pos">
                        <option>Pilih Posyandu</option>
                        <?php $sql=mysql_query( "SELECT * FROM posyandu"); if (mysql_num_rows($sql)> 0) { while ($row = mysql_fetch_array($sql)) { ?>
                        <option value="<?php echo $row['id_pos']; ?>">
                            <?php echo $row[ 'nama_pos']; ?>
                        </option>
                        <?php } } ?>

                    </select>
                </td>
            </tr>
            <tr>
                <td width="100">nip</td>
                <td>
                    <input type="text" name="nip" />
                </td>
            </tr><tr>
                <td width="100">username</td>
                <td>
                    <input type="text" name="username" />
                </td>
            </tr><tr>
                <td width="100">password</td>
                <td>
                    <input type="password" name="password" />
                </td>
            </tr><tr>
                <td width="100">alamat</td>
                <td>
                    <input type="text" name="alamat" />
                </td>
            </tr>
            <tr>
                <td width="100">nomor_telpon</td>
                <td>
                    <input type="text" name="nomor_telpon" />
                </td>
            </tr>
            <tr>
                <td width="100">Role</td>
                <td>
                    <select name="id_role">
                        <option>Pilih Role</option>
                        <?php $sql=mysql_query( "SELECT * FROM role"); if (mysql_num_rows($sql)> 0) { while ($row = mysql_fetch_array($sql)) { ?>
                        <option value="<?php echo $row['id_role']; ?>">
                            <?php echo $row[ 'nama_role']; ?>
                        </option>
                        <?php } } ?>

                    </select>
                </td>
            </tr>
            
            <tr></tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="simpan" value="Simpan" />
                </td>
            </tr>
        </table>

    </form>

</body>

</html>