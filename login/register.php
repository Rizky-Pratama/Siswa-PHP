<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Register Akun</title>
</head>

<body>

    <div class="container" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label>REGISTER</label>
                        <hr>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                        </div>

                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="number" class="form-control" id="no_telp" placeholder="Masukkan No Telepon">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" rows="2" style="resize: none;" placeholder="Masukan Alamat"></textarea>
                        </div>

                        <button class="btn btn-register btn-block btn-success">REGISTER</button>

                    </div>
                </div>

                <div class="text-center" style="margin-top: 15px">
                    Sudah punya akun? <a href="login.php">Silahkan Login</a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".btn-register").click(function() {

                var nama = $("#nama").val();
                var username = $("#username").val();
                var password = $("#password").val();
                var no_telp = $("#no_telp").val();
                var alamat = $("#alamat").val();

                if (nama.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Nama Wajib Diisi !'
                    });

                } else if (username.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Username Wajib Diisi !'
                    });

                } else if (password.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi !'
                    });

                } else if (no_telp.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'No Telepon Wajib Diisi !'
                    });
                } else if (alamat.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Alamat Wajib Diisi !'
                    });
                } else {

                    $.ajax({

                        url: "simpan-register.php",
                        type: "POST",
                        data: {
                            "nama": nama,
                            "username": username,
                            "password": password,
                            "no_telp": no_telp,
                            "alamat": alamat
                        },

                        success: function(response) {

                            if (response == "success") {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Register Berhasil!',
                                    text: 'silahkan login!'
                                });

                                $("#nama").val('');
                                $("#username").val('');
                                $("#password").val('');
                                $("#no_telp").val('');
                                $("#alamat").val('');

                            } else {

                                Swal.fire({
                                    type: 'error',
                                    title: 'Register Gagal!',
                                    text: 'silahkan coba lagi!'
                                });
                                console.error();
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