<!DOCTYPE html>
<html lang="en">
<?php
require 'database/koneksi.php';
$sql = mysqli_query($koneksi, "SELECT * FROM profil");
$data = mysqli_fetch_array($sql);
$nama = $data['nama'];
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LOGIN | <?= $nama ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="Admin/assets/img/favicon.png" rel="icon">
    <link href="Admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="Admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="Admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="Admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="Admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="Admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="Admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="Admin/assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="Admin/assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block"><?= $nama ?></span>
                                </a>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate id="formlogin">
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="button" id="login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="credits">
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="Admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="Admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Admin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="Admin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="Admin/assets/vendor/quill/quill.js"></script>
    <script src="Admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="Admin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="Admin/assets/vendor/php-email-form/validate.js"></script>
    <script src="Admin/assets/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#login').click(function() {
                $(this).prop('disabled', true).html(`
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                `);
                var data = $('#formlogin').serialize();
                $.ajax({
                    type: "POST",
                    data: data,
                    dataType: "json",
                    url: 'validasi.php',
                    success: function(respon) {
                        if (respon.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: respon.message,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    if (respon.role == 'admin') {
                                        window.location.href = "Admin";
                                    } else {
                                        window.location.href = "User";
                                    }
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Password Dan Sandi Salah",
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Terjadi kesalahan saat melakukan AJAX request".error,
                        });
                    },
                    complete: function() {
                        $('#login').prop('disabled', false).html('Login');
                    }
                })
            })
        })
    </script>
</body>

</html>