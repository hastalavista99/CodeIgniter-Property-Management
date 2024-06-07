<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Tenants<?= $this->endSection() ?>



<?= $this->section('content') ?>
<?= $this->include('partials/sidebar') ?>
<div class="col-12">
  <div class="card my-4">
    <div class="d-flex justify-content-between">
      <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
        <div class="pt-1 pb-1">
          <h4 class="row text-capitalize ps-3"><?= esc($title) ?></h4>
        </div>
      </div>
      <div class="col-md-2 pt-3">
        <div>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tenantModal">
            <i class="material-icons opacity-10 me-2">person_add</i>
            Tenant
          </button>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="container">
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
      </div>
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone No</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id no</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Property</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit no</th>
              <th class="text-secondary opacity-7"></th>
              <th class="text-secondary opacity-7"></th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tenants as $tenant) : ?>

              <tr>
                <td class="text-center"><?= esc($tenant['id']) ?></td>
                <td class="text-center"><?= esc($tenant['name']) ?></td>
                <td class="text-center"><?= esc($tenant['phone_number']) ?></td>
                <td class="text-center"><?= esc($tenant['email']) ?></td>
                <td class="text-center"><?= esc($tenant['id_number']) ?></td>
                <td class="text-center"><?= esc($tenant['tenant_status']) ?></td>
                <td class="text-center"><?= esc($tenant['property_name']) ?></td>
                <td class="text-center"><?= esc($tenant['unit_number']) ?></td>
                <td class="text-center">
                  <?php if($tenant['tenant_status'] == 'unassigned'){ ?>
                    <a href="<?= site_url('assign')?>" class="text-success text-uppercase text-xs">Assign</a>

                  <?php } else {?>
                    <a href="<?= site_url('vacate')?>" class="text-warning text-uppercase text-xs">vacate</a>
                 <?php }?>
                  
                </td>
                <td class="text-center">
                  <a href=""><i class="fa fa-pen text-success me-2"></i></a>
                </td>
                <td>
                  <a href=""><i class="fa fa-trash text-danger"></i></a>
                </td>

              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- new tenant modal -->
<div class="modal" id="tenantModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">New Tenant</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form action="<?= site_url('createTenant') ?>" method="post">
          <?= csrf_field() ?>
          <div class="row g-3 my-1">

            <div class="col-md-12">
              <label for="tenantName" class="form-label">Name:</label>
              <input type="text" class="form-control ps-2" id="tenantName" name="name" autocomplete="off">
            </div>

            <div class="col-md-6">
              <label for="tenantEmail" class="form-label">Email:</label>
              <input type="email" class="form-control ps-2" id="tenantEmail" name="email" autocomplete="off">
            </div>
            <div class="col-md-6">
              <label for="tenantPhone" class="form-label">Phone Number:</label>
              <input type="text" class="form-control ps-2" id="tenantPhone" name="phone_number" autocomplete="off">
            </div>

            <div class="col-md-3">
              <label for="tenantId" class="form-label">Identity No / Passport:</label>
              <input type="text" class="form-control ps-2" id="tenantId" name="id_number" autocomplete="off">
            </div>


            <div class="col-12 d-flex align-content-end justify-content-end">
              <input type="submit" value="Create" class="btn btn-primary"></button>
            </div>
        </form>
      </div>
    </div>


  </div>
</div>


<!-- assign modal  -->
<div class="modal" id="assignModal">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Assign Unit</h5>
        <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form class="row g-3 my-1" action="" method="post">
          <div class="col-md-4">
            <label for="property" class="form-label">Property Name</label>
            <select id="property" name="property_Select" class="form-select ps-2">
              <option value="" selected>-- Select Property --</option>
              
            </select>
          </div>
          <div class="col-md-4">
            <label for="unit" class="form-label">Unit Name</label>
            <select id="unit" name="unitSelect" class="form-select ps-2">
              <option value="" selected>-- Select Unit --</option>

            </select>

          </div>
          <div class="col-md-4">
            <label for="type_of" class="form-label">Rent or Lease</label>
            <select name="" id="type_of" class="form-select ps-2">
              <option value="" selected>-- Choose... --</option>
              <option value="rent">Rent</option>
              <option value="lease">Lease</option>
              <option value="hire">Hire</option>
            </select>
          </div>
          <div class="col-12">
            <button type="submit" name="assign" id="submitAssign" class="btn btn-primary">Assign</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>