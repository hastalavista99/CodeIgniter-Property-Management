<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>



<?= $this->section('content') ?>

<div class="col-12">
    <div class="card my-4">
        <div class="">
            <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
                <div class="pt-1 pb-1">
                    <h4 class="row text-capitalize ps-3"><?= esc($title) ?></h4>
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
                } else if (!empty(session()->getFlashdata('errors'))) {
                ?>
                    <ul>
                        <?php foreach (session('errors') as $error) : ?>
                            <li class="text-danger"><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                <?php
                }
                ?>

                <form class="row g-3 my-1" action="<?= site_url('rent/units/bills/set?unit_id=' . $unit_id) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="col-md-3 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Rent</label>
                            <input type="number" class="form-control" name="rent" value="<?= isset($bills['rent']) ? esc($bills['rent']) : '' ?>" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Deposit</label>
                            <input type="number" class="form-control" name="deposit" value="<?= isset($bills['deposit']) ? esc($bills['deposit']) : '' ?>" placeholder=""  required>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Commission</label>
                            <input type="number" class="form-control" name="commission" value="<?= isset($bills['commission']) ? esc($bills['commission']) : '' ?>" placeholder=""  required>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Water Deposit</label>
                            <input type="number" class="form-control" name="water" value="<?= isset($bills['water_deposit']) ? esc($bills['water_deposit']) : '' ?>" placeholder=""  required>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Electricity Deposit</label>
                            <input type="number" class="form-control" name="electricity" value="<?= isset($bills['electricity_deposit']) ? esc($bills['electricity_deposit']) : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Service</label>
                            <input type="number" class="form-control" name="service" value="<?= isset($bills['service_charge']) ? esc($bills['service_charge']) : '' ?>" required>
                        </div>
                    </div>


                    <div class="d-flex justify-content-between">
                        <div class="col-md-2 pt-3 me-2">
                            <div>
                                <a class="btn btn-success" href="<?= site_url('rent/units') ?>">
                                    <i class="fa fa-chevron-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-content-end justify-content-end me-3">
                                <button type="submit" name="bill" id="submitBills" class="btn btn-primary">Set Bills</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>