<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>



<?= $this->section('content') ?>
<?= $this->include('partials/sidebar') ?>

<div class="col-12">
    <div class="card my-4">

        <div class="card-body px-0 pb-2">
            <div class="container">
                <div class="d-flex align-content-center justify-content-center min-height-200 min-width-200 ">
                    <img src="<?= base_url('assets/img/illustrations/9264885.jpg') ?>" alt="" class="img-fluid" width="500px">

                </div>
                <div class="display-5 text-center mt-4">Oops! No records found...</div>
            </div>

        </div>

    </div>
</div>


<?= $this->endSection() ?>