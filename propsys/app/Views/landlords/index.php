<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Landlords<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?= $this->include('partials/sidebar') ?>

<div class="col-12">
  <div class="card my-4">
    <div class="d-flex justify-content-between">
      <?php if (!empty($landlords)) {  ?>
        <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
          <div class="pt-1 pb-1">
            <h4 class="row text-capitalize ps-3">Landlords</h4>
          </div>
        </div>
        <div class="col-md-2 pt-3">
          <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#landlordModal">
              <i class="material-icons opacity-10 me-2">person_add</i>
              Landlord
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
        <table class="table align-items-center mb-0" id="table">
          <thead>
            <tr>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone No</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Properties</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($landlords as $landlord) : ?>

              <tr>
                <td class="text-center"><?= esc($landlord['id']) ?></td>
                <td class="text-center text-capitalize text-decoration-underline"><a href="<?= site_url('viewLandlord?landlord='.$landlord['id'])?>"><?= esc($landlord['name']) ?></a></td>
                <td class="text-center"><?= esc($landlord['phone_number']) ?></td>
                <td class="text-center"><?= esc($landlord['email']) ?></td>
                <td class="text-center"><?= esc($landlord['number_of_properties']) ?></td>
                <td class="text-center"><a href=""><i class="fa fa-pen text-success me-2"></i></a>
                  <a href=""><i class="fa fa-trash text-danger"></i></a>
                </td>

              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      </div>
    </div>
  <?php } else {

        header('Location: ' . base_url('noData'));
        exit();
      } ?>
  </div>
</div>

<!-- insert Modal -->
<div class="modal fade" id="landlordModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Landlord</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form action="<?= site_url('insertLandlord') ?>" method="post">
          <div class="input-group input-group-outline col-md-12 my-3">
            <label for="landlordName" class="form-label">Name</label>
            <input type="text" class="form-control ps-2" id="landlordName" name="name" autocomplete="off">
          </div>

          <div class="input-group input-group-outline col-md-6 my-3">
            <label for="landlordEmail" class="form-label">Email</label>
            <input type="email" class="form-control ps-2" id="landlordEmail" name="email" autocomplete="off">
          </div>
          <div class="input-group input-group-outline col-md-5 my-3">
            <label for="landlordPhone" class="form-label">Phone Number (07********)</label>
            <input type="tel" pattern="[0-9]{10}" class="form-control ps-2" id="landlordPhone" name="phone_number" autocomplete="off">
          </div>

          <div class="col-12 my-3">
            <button type="submit" name="landlord" class="btn btn-primary">Create</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>


<?= $this->endSection() ?>