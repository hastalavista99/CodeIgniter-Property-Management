<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>



<?= $this->section('content') ?>


<div class="col-12">
    <div class="card my-4">
        <div class="d-flex justify-content-between">
            <?php if (!empty($payments)) {  ?>
                <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
                    <div class="d-flex align-content-between justify-content-between">
                        <div class="pt-1 pb-1">
                            <h4 class="row text-capitalize ps-3">Paybill <?= esc($title) ?></h4>
                        </div>
                        <div class="pt-1 pb-1 mb-1">
                            <h4 class="text-capitalize display-6 ps-3">Total: <?= esc($total); ?></h4>
                        </div>
                    </div>


                </div>
                <div class="col-md-2 pt-3">
                    <div>
                        <a href="<?= site_url('accounts') ?>" class="btn btn-success">
                            <i class="material-icons opacity-10">chevron_left</i>
                            Back
                        </a>
                    </div>
                </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="paymentstable">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">amount</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">trans Id</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">paybill</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">billref</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">msisdn</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>

                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment) : ?>

                            <tr>
                                <td class="text-center"><?= esc($payment['mp_id']) ?></td>
                                <td class="text-center"><?= esc($payment['mp_name']) ?></td>
                                <td class="text-center"><span class="text-xxs">KES </span><?= esc($payment['TransAmount']) ?></td>
                                <td class="text-center"><?= esc($payment['TransID']) ?></td>
                                <td class="text-center"><?= esc($payment['ShortCode']) ?></td>
                                <td class="text-center"><?= esc($payment['BillRefNumber']) ?></td>
                                <td class="text-center"><?= esc($payment['MSISDN']) ?></td>
                                <td class="text-center"><?= esc($payment['mp_date']) ?></td>

                                <td class="text-center">
                                </td>

                            </tr>
                        <?php endforeach ?>
                    <?php } else {
                    $this->include('partials/no_records');
                } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>