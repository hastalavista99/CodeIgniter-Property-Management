<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>



<?= $this->section('content') ?>


<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
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
                        <?= esc($tenant['name']) ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Tenant
                    </p>
                </div>
            </div>
            <div class="col-md-2 pt-3">
                <div>
                    <a class="btn btn-primary" href="#">
                        <i class="material-icons opacity-10 me-2">payments</i>
                        Pay Rent
                    </a>
                </div>
            </div>
            <a href="<?= site_url('rent/tenants')?>" class="text-underline text-primary text-sm my-2"><i class="fas fa-chevron-left"></i> Back to Tenants</a>

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
                                    <h6 class="mb-0">Tenant Information</h6>
                                </div>
                                <div class="col-md-4 text-center">
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editTenantModal">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Tenant"></i>
                                    </a>
                                    <?php if ($userInfo['role'] == 'admin') { ?>


                                        <!-- <a href="<?= site_url('deleteTenant?tenant=' . $tenant['id']) ?>" >
                                        <i class="fas fa-trash text-danger text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Tenant"></i>
                                    </a><?php } ?> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">ID No.:</strong> &nbsp; <?= esc($tenant['id_number']) ?></li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; <?= esc($tenant['phone_number']) ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= esc($tenant['email']) ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; USA</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark text-capitalize">Contract:</strong> &nbsp; <?= esc($tenant['contract']) ?></li>
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
                                    <h6 class="mb-0">Payment Information</h6>
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- edit tenant modal -->
<div class="modal" id="editTenantModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="width: 150%">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">New Tenant</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?= site_url('editTenant?tenant=' . $tenant['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row g-3 my-1">

                        <div class="input-group input-group-static my-3 col-md-12">
                            <label for="tenantName">Name:</label>
                            <input type="text" value="<?= esc($tenant['name']) ?>" class="form-control ps-2" id="tenantName" name="name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="tenantEmail">Email:</label>
                                <input type="email" value="<?= esc($tenant['email']) ?>" class="form-control ps-2" id="tenantEmail" name="email" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="tenantPhone">Phone Number:</label>
                                <input type="text" value="<?= esc($tenant['phone_number']) ?>" class="form-control ps-2" id="tenantPhone" name="phone_number" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group input-group-static my-3">
                                <label for="tenantId">ID No.</label>
                                <input type="text" value="<?= esc($tenant['id_number']) ?>" class="form-control ps-2" id="tenantId" name="id_number" autocomplete="off">
                            </div>
                        </div>




                        <div class="col-12 d-flex align-content-end justify-content-end">
                            <input type="submit" value="Update" class="btn btn-primary"></button>
                        </div>
                </form>
            </div>
        </div>


    </div>
</div>
<?= $this->endSection() ?>