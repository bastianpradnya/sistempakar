<?php
    include 'session.php';
?>

<?php
/*
 * menjalankan query simpan data
 * Parameter saveData yang digunakan,
 * variabel nama_admin dari input data admin
 * variabel username dari inputdata form username
 * variabel password dari input data password
 * variabel conn dari variabel koneksi yang digunakan untuk proses query dari file DbConnect.php directory config
 */
function saveData($namaPakar, $username, $password, $konek){
    //query data
    $sql = "INSERT INTO pakar (nama_pakar, username, password )VALUES ('$namaPakar', '$username', '$password')";

    if ($konek->query($sql) === TRUE) {
        //echo "New record created successfully";
        /*
         * Jika record berhasil disimpan maka dilakukan direct halaman
         * ke halaman manage-admin.php dengan menggunakan perintah js
         */
        echo "Data Record Berhasil Disimpan<br><hr>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $konek->close();
}

?>

<?php
//declarate var
$pesan = array(null, null, null, null );
$formWarning =  array(null, null, null, null);
$namaAdmin =  $username = $pass =  $password = null;

//panggil database connect untuk proses query
include "koneksi.php";

//validasi jika form terkirim adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $namaPakar = $_POST['nama_pakar'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $password = $_POST['password'];

    if(empty($namaPakar) || empty($username) || empty($pass) || empty($password)){

        if (empty($namaPakar)) {
            $pesan[0] =  "* Nama tidak Boleh Kosong";
            $formWarning[0] = "has-warning";
        }
        if (empty($username)) {
            $pesan[1] =  "* Username tidak Boleh Kosong";
            $formWarning[1] = "has-warning";
        }
        if (empty($pass)) {
            $pesan[2] =  "* Password tidak Boleh Kosong";
            $formWarning[2] = "has-warning";
        }
        if (empty($password)) {
            $pesan[3] =  "* PassKonfirmasi  tidak Boleh Kosong";
            $formWarning[3] = "has-warning";
        }

    }else{

        $query = "SELECT 1 FROM pakar WHERE username = '$username'";
        $result = $konek->query($query);

        if($result->num_rows > 0){
            $pesan[1] =  "* Username Sudah Ada";
            $formWarning[1] = "has-warning";
        } elseif($pass != $password){
            $pesan[2] =  "* Password Tidak Sama";
            $formWarning[2] = "has-warning";
            $pesan[3] =  " * Password Tidak Sama";
            $formWarning[3] = "has-warning";
        }else{
            //jalankan function simpan data
            saveData($namaPakar, $username, $password, $konek);
        }
    }
}
?>

<h2>.:: Tambah Pakar ::.<h2>
<form action="#" method="post" enctype="multipart/form-data">
	<table border="1">
		<tr>
 			<input type="text" class="form-control" id="text" name="nama_pakar" value="<?php echo $namaPakar ?>" placeholder="Nama Lengkap">
            <p><i><?php echo $pesan[0] ?></i></p>
		</tr>
		<tr>
			<input type="text" class="form-control" id="text" name="username" value="<?php echo $username ?>" placeholder="Username Admin">
            <p><i><?php echo $pesan[1] ?></i></p>
		</tr>
		<tr>
			<input type="password" class="form-control" name="pass" value="<?php echo $pass ?>" placeholder="Password">
            <p><i><?php echo $pesan[2] ?></i></p>
		</tr>
		<tr>
			<input type="password" class="form-control" value="<?php echo $password?>" name="password" placeholder="Konfirmasi password">
            <p><i><?php echo $pesan[3] ?></i></p>
		<tr>
				<input type="submit" value="Simpan" />
				<input type="reset" value="Reset" />
		</tr>
	</table>	
</form>