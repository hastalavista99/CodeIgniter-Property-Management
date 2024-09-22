<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>



<?= $this->section('content') ?>
<?= $this->include('partials/sidebar') ?>

<div class="col-12">
    <div class="card my-4">
        <?php if (!empty($properties)) {  ?>
            <div class="d-flex justify-content-between">
                <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
                    <div class="pt-1 pb-1">
                        <h4 class="row text-capitalize ps-3">Properties</h4>
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
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">active?</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">vacant_units</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">occupied units</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">total units</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($properties as $property) : ?>
                                <tr>
                                    <td class="text-center"><?= esc($property['id']) ?></td>
                                    <td class="text-center"><a href="<?= site_url('propertyShow?property=' . $property['name']) ?>"><?= esc($property['name']) ?></a></td>
                                    <td class="text-center"><?= esc($property['location']) ?></td>
                                    <td class="text-center"><?= esc($property['active_status']) ?></td>
                                    <td class="text-center"><?= esc($property['vacant_units']) ?></td>
                                    <td class="text-center"><?= esc($property['occupied_units']) ?></td>
                                    <td class="text-center"><?= esc($property['total_units']) ?></td>
                                    <td class="text-center"><a href=""></i></a>
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