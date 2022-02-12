<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
            <div class="collapse navbar-collapse col-md-auto justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
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
                                            <a class="btn btn-sm btn-primary btn-edit " href="formEdit.php?id=<?php echo $row['id_siswa'] ?>">Edit</a>
                                            <button class="btn btn-sm btn-danger" onclick="hapus(<?php echo $row['id_siswa'] ?>)">Hapus</button>
                                        </td>
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

    <script async='async' type='text/javascript'>
        $(document).ready(function() {

            $('#myTable').DataTable();

        });

        // Hapus Data
        function hapus(id) {

            $.ajax({
                type: 'POST',
                data: {
                    id: id
                },
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
    </script>
</body>

</html>