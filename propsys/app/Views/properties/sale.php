<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>




<?= $this->section('content') ?>


<div class="col-12">
  <div class="card my-4">

    <div class="d-flex justify-content-between">
      <?php if (!empty($properties)) {  ?>
        <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
          <div class="pt-1 pb-1">
            <h4 class="row text-capitalize ps-3"><?= esc($title) ?></h4>
          </div>
        </div>
        <div class="col-md-2 pt-3">
          <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#saleModal">
              <i class="material-icons opacity-10 me-2">domain_add</i>
              Add
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
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Property</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Landlord</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">units</th>

              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($properties as $property) : ?>

              <tr>
                <td class="text-center"><?= esc($property['property_id']) ?></td>
                <td class="text-center"> <a href="<?= site_url('saleShow?property=' . $property['property_name']) ?>"> <?= esc($property['property_name']) ?></a></td>
                <td class="text-center"><?= esc($property['location']) ?></td>
                <td class="text-center"><?= esc($property['landlord_name']) ?></td>
                <td class="text-center"><?= esc($property['number_of_units']) ?></td>
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
<div class="modal fade" id="saleModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="width: 150%">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Property</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form action="<?= site_url('propertySale') ?>" method="post" class="row">
          <?= csrf_field() ?>
          <div class="input-group input-group-outline my-3">
            <label for="property" class="form-label">Name: </label>
            <input type="text" class="form-control ps-2" id="unitName" name="name" autocomplete="off">
          </div>
          <div class="input-group input-group-outline col-md-12 my-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" class="form-control ps-2" id="location" name="location" autocomplete="off">
          </div>


          <div class="input-group input-group-static my-3">
            <label for="property">Landlord: </label>
            <select id="landlord" name="landlord" class="form-select ps-2">
              <option value="" selected></option>
              <?php foreach ($landlords as $landlord) : ?>
                <option value="<?= $landlord['id'] ?>"><?= esc($landlord['name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>


          <div class="input-group input-group-outline my-3">
            <label for="image" class="">Image <span class="fst-italic text text-xxs">(.pdf, .png, .jpg)</span></label>
            <input type="file" class="form-control" id="image" name="image" autocomplete="off" accept=".pdf, .jpg, .jpeg, .png">
          </div>

          <div class="col-12 d-flex align-content-end justify-content-end my-3">
            <input type="submit" name="sale_create" value="Create" class="btn btn-primary">
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
<?= $this->endSection() ?>