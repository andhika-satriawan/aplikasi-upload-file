<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File dengan PHP dan MySQL</title>
</head>
<body>
    <?php
        include 'koneksi.php';
        if (isset($_POST['upload'])) {
            $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
            $nama                   = $_FILES['file']['name'];
            $x                      = explode('.', $nama);
            $ekstensi               = strtolower(end($x));
            $ukuran                 = $_FILES['file']['size'];
            $file_tmp               = $_FILES['file']['tmp_name'];
            
            if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
                if ($ukuran < 1044070) {
                    move_uploaded_file($file_tmp, 'file/' . $nama);
                    $query = mysqli_query($koneksi, "INSERT INTO upload VALUES(NULL, '$nama')");
                    
                    if ($query) {
                        echo 'File berhasil di upload';
                    } else {
                        echo 'Gagal mengupload gambar';
                    }
                } else {
                    echo 'Ukuran file terlalu besar';
                }
            } else {
                echo 'Ekstensi file yang diupload tidak diperbolehkan';
            }
        }
    ?>

    <br/><br/>

    <a href="index.php">Upload Lagi</a>

    <br/><br/>

    <table>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM upload");
        while($d = mysqli_fetch_array($data)) {  
        ?>    
            <tr>
                <td><img src="<?php echo "file/" . $d['nama_file'] ?>"></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>