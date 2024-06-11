<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>



<?= $this->section('content') ?>


<div class="col-12">
    <div class="card my-4">
        <div class="d-flex justify-content-between">
            <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
                <div class="pt-1 pb-1">
                    <h4 class="row text-capitalize ps-3"><?= esc($title) ?></h4>
                </div>
            </div>

        </div>
        <div class="card-body px-0 pb-2">
            <div class="container">
                <?= validation_list_errors() ?>

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
                <form action="<?= site_url('registerUser') ?>" method="post" class="form mb-3 row">

                    <?= csrf_field() ?>

                    <div class="col-6">
                        <div class="input-group input-group-outline mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="" class="form-control ps-2" value="<?= set_value('name') ?>">

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group input-group-outline mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" id="" class="form-control ps-2" value="<?= set_value('email') ?>">

                        </div>
                    </div>

                    <div class="input-group input-group-outline mb-3 ">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control ps-2" value="<?= set_value('password') ?>">

                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label for="passwordConf" class="form-label">Confirm Password</label>
                        <input type="password" name="passwordConf" id="passwordConf" class="form-control ps-2" value="<?= set_value('passwordConf') ?>">

                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="input-group input-group-static mb-3">
                            <label for="">Role:</label>
                            <select name="role" class="form-control ps-2" id="">
                                <option value="user" class="text-center" selected>User</option>
                                <option value="admin" class="text-center">Admin</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkPassword">
                        <label class="form-check-label" for="checkPassword">
                            Show Password
                        </label>
                    </div>


                    <div class="d-flex align-content-end justify-content-end input-group input-group-outline mb-3 pe-3">
                        <input type="submit" value="Submit" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('checkPassword').addEventListener('change', function() {
        let passwordFields = document.querySelectorAll('#password, #passwordConf');
        passwordFields.forEach(field => {
            if (this.checked) {
                field.type = 'text';
            } else {
                field.type = 'password';
            }
        });
    });
</script>
<?= $this->endSection() ?>