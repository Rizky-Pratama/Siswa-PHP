<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Siswa</title>
</head>

<body style="background-color: #e9e9e9;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Siswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-md-auto justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Tambah Siswa <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Profil</a>
                            <a class="dropdown-item" href="#">Log Out</a>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 1rem;">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>Tambah Siswa</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" id="nisn" placeholder="Masukkan NISN Siswa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" id="nama" placeholder="Masukkan Nama Siswa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>No HP</label>
                            <input type="number" id="no_telp" placeholder="Masukkan No HP Yang Aktif" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" style="resize: none;" rows="2"> </textarea>
                        </div>

                        <button class="btn btn-success btn-daftar">Simpan</button>
                        <button class="btn btn-warning">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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

                        url: "simpanSiswa.php",
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