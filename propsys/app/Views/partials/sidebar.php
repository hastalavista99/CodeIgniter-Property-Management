<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      <i class="material-icons opacity-10 fs-2">account_circle</i>
      <span class="ms-1 font-weight-bold text-white">
        <?= esc($userInfo['user_name']) ?></span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2" />
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="dashboard">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <?php  if($userInfo['role'] != 'tenant') {?>

       
      <li class="nav-item">
        <a class="nav-link text-white" href="landlords">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1">Landlords</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="tenants">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">groups</i>
          </div>
          <span class="nav-link-text ms-1">Tenants</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="properties">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">other_houses</i>
          </div>
          <span class="nav-link-text ms-1">Properties</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="units">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">home_work</i>
          </div>
          <span class="nav-link-text ms-1">Units</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="propertySale">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">landscape</i>
          </div>
          <span class="nav-link-text ms-1">Properties For Sale</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="unitSale">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">forest</i>
          </div>
          <span class="nav-link-text ms-1">Units For Sale</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="accounts">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">account_balance</i>
          </div>
          <span class="nav-link-text ms-1">Accounts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="users">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">settings</i>
          </div>
          <span class="nav-link-text ms-1">Settings</span>
        </a>
      </li>
       <?php
      } else {?>
      <li class="nav-item">
        <a class="nav-link text-white" href="profile">
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
      <a class="btn btn-outline-primary mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Macrologic Systems</a>
      
    </div>
  </div>
</aside>