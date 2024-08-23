<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/icons/favicon.png') ?>">
  <title>
    Tenant Sign In
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/material-dashboard.css?v=3.1.0') ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url(<?= base_url('assets/img/illustrations/prop.png') ?>); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Tenant Sign In</h4>
                  <p class="mb-0">Enter your credentials to proceed</p>
                </div>

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
                  <div class="alert alert-danger text-white alert-dismissible fade show">
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

                <div class="card-body">
                  <form action="<?= site_url('auth/tenant/signin') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="mb-3 input-group input-group-outline">
                      <label for="id_number" class="form-label">Username</label>
                      <input type="text" name="username" id="user_name" class="form-control ps-2" required>
                    </div>

                    <div class="mb-3 input-group input-group-outline">
                      <label for="id_number" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control ps-2" required>
                    </div>

                    <div class="text-center">
                      <input type="submit" id="signUpButton" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Submit">
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    <a href="<?= site_url('login') ?>" class="back-btn text-primary text-gradient font-weight-bold"><i class="material-icons opacity-10 text-xxs">arrow_back_ios</i> Back To Sign In</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script>
    // check whether the checkbox is checked if not, then disable the button
    var checkbox = document.getElementById("flexCheckDefault");
    var signUpButton = document.getElementById("signUpButton");

    checkbox.addEventListener("change", function() {
      signUpButton.disabled = !checkbox.checked;
    });
  </script>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=3.1.0') ?>"></script>
</body>

</html>