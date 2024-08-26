<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icons/favicon.png') ?>">
    <title>
        Forgot Password
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/css/material-dashboard.css?v=3.1.0') ?>" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('<?= base_url('assets/img/illustrations/sign-in.jpg') ?>');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">


                            <div class="card-body">
                                <p class="text-bold">Renew you password.</p>
                                <p class="text-sm">Use a mixture of alphabetical letters, numbers and other characters to create a strong password</p>

                                <form role="form" action="<?= site_url('auth/renew_auth?user='.$user) ?>" id="signupForm" class="text-start" method="post">
                                    <?= csrf_field() ?>

                                    <?php
                                    if (!empty(session()->getFlashdata('success'))) {
                                    ?>
                                        <div class="alert alert-success text-white alert-dismissible fade show">
                                            <span class="alert-icon align-middle">
                                                <span class="material-icons text-md">
                                                    thumb_up
                                                </span>
                                            </span>
                                            <?= session()->getFlashdata('success') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php
                                    } else if (!empty(session()->getFlashdata('fail'))) {
                                    ?>
                                        <div class="alert alert-warning text-white alert-dismissible fade show">
                                            <span class="alert-icon align-middle">
                                                <span class="material-icons text-md">
                                                    warning
                                                </span>
                                            </span>
                                            <?= session()->getFlashdata('fail') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <!-- <div class="my-3 input-group input-group-outline">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="name" class="form-control ps-2" value="" required>
                                    </div> -->
                                    <div class="mb-3 input-group input-group-static">
                                        <label class="">Password</label>
                                        <input type="password" name="password" id="password" class="form-control ps-2" required>
                                    </div>
                                    <div class="mb-3 input-group input-group-static">
                                        <label class="">Confirm Password</label>
                                        <input type="password" name="password" id="passwordConf" class="form-control ps-2" required>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="" id="checkPassword">
                                        <label class="form-check-label" for="checkPassword">
                                            Show Password
                                        </label>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" value="Submit" class="btn bg-gradient-primary w-100 my-2 mb-2">
                                    </div>

                                </form>
                                <script>
                                    document.getElementById('checkPassword').addEventListener('change', function() {
                                        let passwordFields = document.querySelectorAll('#password, #passwordConf');
                                        passwordFields.forEach(field => {
                                            if (this.checked) {
                                                field.type = 'text';
                                            } else {
                                                field.type = 'password';
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/util.js') ?>"></script>
    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('assets/js/material-dashboard.min.js?v=3.1.0') ?>"></script>
</body>

</html>