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
                    <a class="btn btn-success" href="tenants">
                        <i class="material-icons opacity-10">chevron_left</i>
                        Back
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body px-0 pb-2">
            <div class="container row">
                <div class="d-flex align-content-center justify-content-center">
                    
                    <ul class="" style="list-style: none;">
                    <h5>Tenant Details</h5>
                        <li>Name: <span class="text-bolder"><?= esc($tenant['name'])?></span></li>
                        <li>Email: <span class="text-bolder"><?= esc($tenant['email'])?></span></li>
                        <li>Mobile: <span class="text-bolder"><?= esc($tenant['phone_number'])?></span></li>
                        <li>Id No: <span class="text-bolder"><?= esc($tenant['id_number'])?></span></li>
                        <li>Property: <span class="text-bolder"><?= esc($property)?></span></li>
                        <li>Unit: <span class="text-bolder"><?= esc($unit)?></span></li>
                    </ul>
                </div>
                <form action="<?= site_url('vacateTenant?tenant='.$tenantId)?>" method="post">
                    <div class="row">
                        <div class="">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <textarea name="comment" id="" class="input-group" placeholder="Reason for Vacate?"></textarea>
                            </div>
                            <div class="d-flex align-content-end justify-content-end">
                                <input type="submit" value="Vacate Tenant" class="btn btn-primary">
                            </div>
                        </div>
                        
                    </div>
                    
                </form>
            </div>


        </div>
    </div>
</div>
<?= $this->endSection() ?>