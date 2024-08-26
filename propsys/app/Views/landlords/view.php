<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>



<?= $this->section('content') ?>


<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-info  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="">
                    <i class="material-icons opacity-10 fs-1">account_circle</i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1 text-capitalize">
                        <?= esc($landlord['name']) ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Landlord
                    </p>
                </div>
            </div>
            
            <a href="<?= site_url('landlords')?>" class="text-underline text-primary text-sm my-2"><i class="fas fa-chevron-left"></i> Back to landlords</a>

        </div>
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
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Landlord Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editlandlordModal">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit landlord"></i>
                                    </a>
                                    <?php if ($userInfo['role'] == 'admin') { ?>


                                        <!-- <a href="<?= site_url('deletelandlord?landlord=' . $landlord['id']) ?>" >
                                        <i class="fas fa-trash text-danger text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete landlord"></i>
                                    </a><?php } ?> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">

                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                               
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; <?= esc($landlord['phone_number']) ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= esc($landlord['email']) ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; USA</li>
                                
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-facebook fa-lg"></i>
                                    </a>
                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-instagram fa-lg"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Properties </h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">

                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                            <?php if (!empty($properties)) {  ?>
                                <?php foreach ($properties as $property) : ?>
                               
                                <li class="list-group-item border-0 ps-0 text-sm d-flex align-content-between justify-content-between"><a href="<?= site_url('propertyShow?property='.$property['name'])?>"><strong class="text-capitalize"><?= esc($property['name'])?></strong></a> &nbsp; <span class="text-capitalize"><i class="material-icons opacity-10 text-danger me-2">location_on</i><?= esc($property['location']) ?></span></li>
                                <?php endforeach ?>

                                <?php } else { ?>
                                    <li class="list-group-item border-0 ps-0 text-sm d-flex align-content-between justify-content-between">
                                        <strong class="text-capitalize">No Properties To Show</strong>
                                    </li>
                                    <?php } ?>



                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>