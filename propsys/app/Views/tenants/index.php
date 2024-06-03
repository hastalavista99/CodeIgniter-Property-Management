<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Tenants<?= $this->endSection() ?>



<?= $this->section('content') ?>
<?= $this->include('partials/sidebar') ?>
<div class="col-12">
    <div class="card my-4">
    <div class="d-flex justify-content-between">
          <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
            <div class="pt-1 pb-1">
              <h4 class="row text-capitalize ps-3"><?= esc($title)?></h4>
            </div>
          </div>
          <div class="col-md-2 pt-3">
            <div>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#landlordModal">
                <i class="material-icons opacity-10 me-2">person_add</i>
                Tenant
              </button>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
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

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>