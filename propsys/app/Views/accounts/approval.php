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
                    <a class="btn btn-success" href="accounts">
                        <i class="material-icons opacity-10">arrow_back_ios</i>
                        Back
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body px-0 pb-2">
            <ul class="list-group list-group-xxl my-2" style="list-style: none;">
                <li><a class="list-group-item list-group-item-action text-center text-capitalize fs-4" href="rent_approval">
                        Rent
                    </a></li>
                <li><a class="list-group-item list-group-item-action text-center text-capitalize fs-4" href="utilities_approval">
                        Utilities
                    </a></li>
                <li><a class="list-group-item list-group-item-action text-center text-capitalize fs-4" href="land_sale_approval">
                        Land Sale
                    </a></li>
                <li><a class="list-group-item list-group-item-action text-center text-capitalize fs-4" href="payment_report">
                        Acquisitions
                    </a></li>
            </ul>

        </div>
    </div>
</div>
<?= $this->endSection() ?>