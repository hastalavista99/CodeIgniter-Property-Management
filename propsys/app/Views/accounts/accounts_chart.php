<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>



<?= $this->section('content') ?>


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
          <a class="btn btn-outline-success" href="accounts">
            <i class="material-icons opacity-10">chevron_left</i>
            Back
          </a>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#landlordModal">
            <i class="material-icons opacity-10">add</i>
            Add
          </button>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0" id="table">
          <thead>
            <tr>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">account no</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">description</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">type</th>

              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($accounts as $account) : ?>

              <tr>
                <td class="text-center"><?= esc($account['id']) ?></td>
                <td class="text-center"><?= esc($account['account_no']) ?></td>
                <td class="text-center"><?= esc($account['description']) ?></td>
                <td class="text-center"><?= esc($account['type']) ?></td>

                <td class="text-center"><a href=""><i class="fa fa-pen text-success me-2"></i></a>
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
<?= $this->endSection() ?>