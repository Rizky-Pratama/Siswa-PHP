<?php
include('../login/koneksi.php');

$id = $_GET['id'];
$query = "SELECT * FROM siswa WHERE id_siswa = $id LIMIT 1";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>

<body style="background-color: #e9e9e9;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Siswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-md-auto" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="dashboard.php?id=">Home</a>
                    <a class="nav-link" href="tambahSiswa.php">Tambah Siswa</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card shadow-sm" style="margin-top: 1rem;">
            <div class="card-header">
                <h5><i class="bi bi-pencil-fill"></i>
                    Edit Data Siswa
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" id="nisn" placeholder="Masukkan NISN Siswa" class="form-control" value="<?php echo $row['nisn'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" id="nama" placeholder="Masukkan Nama Siswa" class="form-control" value="<?php echo $row['nama'] ?>">
                        </div>

                        <div class="form-group">
                            <label>No HP</label>
                            <input type="number" id="no_telp" placeholder="Masukkan No HP" class="form-control" value="<?php echo $row['no_telp'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" placeholder="Masukkan Alamat Siswa" rows="4" style="resize: none;"><?php echo $row['alamat'] ?></textarea>
                        </div>
                        <button class="btn btn-success btn-daftar">Simpan</button>
                        <a href="dashboard.php" class="btn btn-danger">Batal</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".btn-daftar").click(function() {

                var nisn = $("#nisn").val();
                var nama = $("#nama").val();
                var no_telp = $("#no_telp").val();
                var alamat = $("#alamat").val();

                if (nisn.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'NISN Lengkap Wajib Diisi !'
                    });

                } else if (nama.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Nama Wajib Diisi !'
                    });

                } else if (no_telp.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'No HP Wajib Diisi !'
                    });

                } else if (alamat.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Alamat Wajib Diisi !'
                    });

                } else {

                    $.ajax({

                        url: "simpanEditSiswa.php",
                        type: "POST",
                        data: {
                            "nisn": nisn,
                            "nama": nama,
                            "no_telp": no_telp,
                            "alamat": alamat
                        },

                        success: function(response) {

                            if (response == "success") {

                                Swal.fire({
                                        type: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data sudah ditambah!'
                                    })
                                    .then(function() {
                                        window.location.href = "dashboard.php";
                                    });

                            } else {

                                Swal.fire({
                                    type: 'error',
                                    title: 'Gagal!',
                                    text: 'Data gagal ditambah!'
                                });

                            }

                            console.log(response);

                        },

                        error: function(response) {
                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });
                        }

                    })

                }

            });

        });
    </script>
</body>

</html>