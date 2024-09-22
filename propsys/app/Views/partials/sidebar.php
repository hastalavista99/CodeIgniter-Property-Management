<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="#" target="_blank">
      <img src="<?= base_url('assets/img/icons/logo.png') ?>" class="navbar-brand-img h-100" alt="main_logo" />
      <span class="ms-1 font-weight-bold text-white">Property</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2" />
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= site_url('dashboard') ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <?php if ($userInfo['role'] == 'landlord') { ?>
        <li class="nav-item">
          <a class="nav-link text-white" data-bs-toggle="collapse" href="#propMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">apartment</i>
            </div>
            <span class="nav-link-text ms-1">My Properties</span>
          </a>
          <div class="collapse bg-gradient-faded-primary" id="propMenu">
            <ul class="nav flex-column ms-3">
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('rent/my_properties?landlord=' . $userInfo['name']) ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">other_houses</i>
                  </div>
                  <span class="nav-link-text ms-1">For Rent</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('sale/my_properties?landlord=' . $userInfo['name']) ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">forest</i>
                  </div>
                  <span class="nav-link-text ms-1">For Sale</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('rent/my_tenants?landlord=' . $userInfo['name'])?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">groups</i>
                  </div>
                  <span class="nav-link-text ms-1">Tenants</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('dashboard') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">paid</i>
            </div>
            <span class="nav-link-text ms-1">Payments</span>
          </a>
        </li>
      <?php
      } ?>
      <?php if ($userInfo['role'] == 'admin') { ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('landlords') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Landlords</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('tenants') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">groups</i>
            </div>
            <span class="nav-link-text ms-1">Tenants</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('properties') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">other_houses</i>
            </div>
            <span class="nav-link-text ms-1">Properties</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('units') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">home_work</i>
            </div>
            <span class="nav-link-text ms-1">Units</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('propertySale') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">landscape</i>
            </div>
            <span class="nav-link-text ms-1">Properties For Sale</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('unitSale') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">forest</i>
            </div>
            <span class="nav-link-text ms-1">Units For Sale</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-white" data-bs-toggle="collapse" href="#rentMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">payments</i>
            </div>
            <span class="nav-link-text ms-1">For Rent</span>

          </a>
          <div class="collapse bg-gradient-faded-primary" id="rentMenu">
            <ul class="nav flex-column ms-3">
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('rent/properties') ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">other_houses</i>
                  </div>
                  <span class="nav-link-text ms-1">Properties</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('rent/units') ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">home_work</i>
                  </div>
                  <span class="nav-link-text ms-1">Units</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('rent/tenants') ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">groups</i>
                  </div>
                  <span class="nav-link-text ms-1">Tenants</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" data-bs-toggle="collapse" href="#saleMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">sell</i>
            </div>
            <span class="nav-link-text ms-1">For Sale</span>

          </a>
          <div class="collapse bg-gradient-faded-primary" id="saleMenu">
            <ul class="nav flex-column ms-3">
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('sale/properties') ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">landscape</i>
                  </div>
                  <span class="nav-link-text ms-1">Properties</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('sale/units') ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">forest</i>
                  </div>
                  <span class="nav-link-text ms-1">Units</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">groups</i>
                  </div>
                  <span class="nav-link-text ms-1">Buyers</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" data-bs-toggle="collapse" href="#accountMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">account_balance</i>
            </div>
            <span class="nav-link-text ms-1">Accounts</span>

          </a>
          <div class="collapse bg-gradient-faded-primary" id="accountMenu">
            <ul class="nav flex-column ms-3">
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('accounts/paypesa') ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">smartphone</i>
                  </div>
                  <span class="nav-link-text ms-1">Paybill</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('accounts/approval') ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">checklist</i>
                  </div>
                  <span class="nav-link-text ms-1">Approve</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('charts') ?>">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">groups</i>
                  </div>
                  <span class="nav-link-text ms-1">Buyers</span>
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link text-white" href="#">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">receipt_long</i>
                  </div>
                  <span class="nav-link-text ms-1">Reports</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">lock</i>
                  </div>
                  <span class="nav-link-text ms-1">Close Period</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('users') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">manage_accounts</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('accounts') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">account_balance</i>
            </div>
            <span class="nav-link-text ms-1">Accounts</span>
          </a>
        </li> -->


      <?php
      } else if ($userInfo['role'] == 'tenant') { ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= site_url('profile') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">payments</i>
            </div>
            <span class="nav-link-text ms-1">My Payments</span>
          </a>
        </li>

      <?php
      }
      ?>

    </ul>
  </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0">
    <div class="mx-3">
      <a class="btn btn-outline-primary mt-4 w-100" href="https://www.macrologicsys.com" type="button">Macrologic Systems</a>

    </div>
  </div>
</aside>