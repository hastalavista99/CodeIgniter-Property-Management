<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>



<?= $this->section('content') ?>


<div class="col-12">
  <div class="card my-4">
    <div class="d-flex justify-content-between">
      <?php if (!empty($payments)) {  ?>
        <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
          <div class="pt-1 pb-1">
            <h4 class="row text-capitalize ps-3"><?= esc($title) ?></h4>
          </div>
        </div>
        <div class="col-md-2 pt-3">
          <div>
            <a href="accounts" class="btn btn-success">
              <i class="material-icons opacity-10">chevron_left</i>
              Back
            </a>
          </div>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0" id="table">
          <thead>
            <tr>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">property</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">unit</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">landlord</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">amount</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">paid via</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>

              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($payments as $payment) : ?>

              <tr>
                <td class="text-center"><?= esc($payment['id']) ?></td>
                <td class="text-center"><?= esc($payment['buyer_name']) ?></td>
                <td class="text-center"><?= esc($payment['property_name']) ?></td>
                <td class="text-center"><?= esc($payment['unit_name']) ?></td>
                <td class="text-center"><?= esc($payment['landlord_name']) ?></td>
                <td class="text-center"><span class="text-xxs">KES </span><?= esc($payment['amount']) ?></td>
                <td class="text-center"><?= esc($payment['type_payment']) ?></td>
                <td class="text-center"><?= esc($payment['date']) ?></td>

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
<?= $this->endSection() ?>