<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Units<?= $this->endSection() ?>



<?= $this->section('content') ?>


<div class="col-12">
  <div class="card my-4">
    <?php if (!empty($users)) {  ?>
      <div class="d-flex justify-content-between">
        <div class="row card-header col-md-7 p-0 mx-3 z-index-2 mt-3" style="height: 25px;">
          <div class="pt-1 pb-1">
            <h4 class="row text-capitalize ps-3"><?= esc($title) ?></h4>
          </div>
        </div>
        <div class="col-md-2 pt-3">
          <div>
            <a class="btn btn-success" href="register">
              <i class="material-icons opacity-10 me-2">person_add</i>
              User
            </a>
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
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>

                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user) : ?>

                <tr>
                  <td class="text-center"><?= esc($user['id']) ?></td>
                  <td class="text-center"><?= esc($user['user_name']) ?></td>
                  <td class="text-center"><?= esc($user['user_email']) ?></td>
                  <td class="text-center"><?= esc($user['role']) ?></td>
                  <td class="text-center text-xxs text-uppercase font-weight-bolder"><a href="<?= site_url('users/edit?id=' . $user['id']) ?>" class="text-success">edit</a>
                    <a href=""><i class="fa fa-trash text-danger"></i></a>
                  </td>

                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php } else {

      header('Location: ' . base_url('noData'));
      exit();
    } ?>
  </div>
</div>
<?= $this->endSection() ?>