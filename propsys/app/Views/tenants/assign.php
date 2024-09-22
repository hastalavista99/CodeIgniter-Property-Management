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
                    <a class="btn btn-success" href="<?= site_url('rent/tenants')?>">
                        <i class="material-icons opacity-10">chevron_left</i>
                        Back
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

                <form class="row g-3 my-1" action="<?= site_url('assignTenant?id=' . $id) ?>" method="post">
                <?= csrf_field()?>
                    <div class="col-md-3">
                        <label for="property" class="form-label">Property Name</label>
                        <select id="property" name="property_Select" class="form-select ps-2">
                            <option value="" selected>-- Select Property --</option>
                            <?php foreach ($properties as $property) : ?>
                                <option value="<?= $property['id'] ?>"><?= esc($property['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="unit" class="form-label">Unit Number</label>
                        <select id="unit" name="unitSelect" class="form-select ps-2">
                            <option value="" selected>-- Select Unit --</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="type_of" class="form-label">Rent or Lease</label>
                        <select name="contract" id="type_of" class="form-select ps-2">
                            <option value="" selected>-- Choose... --</option>
                            <option value="rent">Rent</option>
                            <option value="lease">Lease</option>
                            <option value="hire">Hire</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="lease" class="form-label" id="leaseLabel" style="display: none;">Duration</label>
                        <select name="leaseSelect" id="lease" class="form-select ps-2" style="display: none;">
                            <option value="three">3-month</option>
                            <option value="six">6-month</option>
                            <option value="twelve">12-month</option>
                        </select>
                    </div>
                    <div class="d-flex align-content-end justify-content-end me-3">
                        <button type="submit" name="assign" id="submitAssign" class="btn btn-primary">Assign</button>
                    </div>
                </form>

                <script>
                    $(document).ready(function() {
                        $('#property').change(function() {
                            var propertyId = $(this).val();
                            $.ajax({
                                url: "<?= site_url('assignTenant/getUnits') ?>",
                                type: 'POST',
                                data: {
                                    property_id: propertyId
                                },
                                success: function(data) {
                                    $('#unit').empty();
                                    $('#unit').append('<option value="" selected>-- Select Unit --</option>');
                                    $.each(data, function(index, unit) {
                                        $('#unit').append('<option value="' + unit.id + '">' + unit.unit_number + '</option>');
                                    });
                                }
                            });
                        });

                        $('#type_of').change(function() {
                            if ($(this).val() === 'lease') {
                                $('#leaseLabel').show();
                                $('#lease').show();
                            } else {
                                $('#leaseLabel').hide();
                                $('#lease').hide();
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>