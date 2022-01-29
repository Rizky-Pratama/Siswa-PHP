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
                    <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="tambahSiswa.php">Tambah Siswa</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card shadow-sm" style="margin-top: 1rem;">
            <div class="card-header">
                <h5><i class="bi bi-pencil-fill"></i>
                    Data Siswa
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="tambahSiswa.php" class="btn btn-md btn-success " style="margin-bottom: 10px">Tambah</a>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">NO.</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NAMA LENGKAP</th>
                                    <th scope="col">NO HP</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../login/koneksi.php');
                                $no = 1;
                                $query = mysqli_query($connection, "SELECT * FROM siswa");
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['nisn'] ?></td>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php echo $row['no_telp'] ?></td>
                                        <td><?php echo $row['alamat'] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['id_siswa'] ?>">Edit</a>
                                            <a class="btn btn-sm btn-danger" onclick="hapus(<?php echo $row['id_siswa'] ?>)">Hapus</a>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $row['id_siswa'] ?>" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                                                        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>NISN</label>
                                                            <input type="text" id="nisn" placeholder="Masukkan NISN Siswa" class="form-control" readonly value="<?php echo $row['nisn'] ?>">
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
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary btn-simpan">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
            $('#myTable').DataTable();
        });


        // Hapus Data
        function hapus(id) {

            $.ajax({
                type: 'POST',
                data: "id=" + id,
                url: 'hapusSiswa.php',
                success: function(response) {

                    if (response == "success") {

                        Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Data sudah dihapus'
                            })
                            .then(function() {
                                window.location.href = "dashboard.php";
                            });

                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Gagal!',
                            text: 'Data gagal dihapus'
                        });

                    }

                }
            });
        }

        // Edit data
        // function edit(id) {

        //     $.ajax({
        //         type: 'POST',
        //         data: "id=" + id,
        //         url: 'editSiswa.php',
        //         success: function(response) {

        //             if (!response == "success") {

        //                 Swal.fire({
        //                     type: 'error',
        //                     title: 'gagal!',
        //                     text: 'Data sudah dihapus'
        //                 })

        //             }

        //         }
        //     });
        // }

        // $(".btn-close").click(function() {
        //     <hp session_unset(); ?>
        // });

        // Simpan edit data
        $(".btn-simpan").click(function() {

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
                                    text: 'Data sudah terubah',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                })
                                .then(function() {
                                    window.location.href = "dashboard.php";
                                });

                            $("#nisn").val('');
                            $("#nama").val('');
                            $("#no_telp").val('');
                            $("#alamat").val('');

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
    </script>
</body>

</html>