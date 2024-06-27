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

                <form class="row g-3 my-1" action="<?= site_url('rentReceive') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="col-md-3">
                        <label for="property" class="form-label">Property Name</label>
                        <select id="property" name="property_Select" class="form-select ps-2">
                            <option value="" selected>-- Select Property --</option>
                            <?php foreach ($properties as $property) : ?>
                                <option value="<?= $property['id'] ?>"><?= esc($property['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="unit" class="form-label">Unit Number</label>
                        <select id="unit" name="unitSelect" class="form-select ps-2">
                            <option value="" selected>-- Select Unit --</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tenant" class="form-label">Tenant</label>
                        <select id="tenant" name="tenantSelect" class="form-select ps-2">
                            <option value="" selected>-- Select tenant --</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="rentMonthSelect" class="form-label">Month:</label>
                        <select name="rentMonth" id="rentMonthSelect" class="form-select ps-2">
                            <?php
                            function generateMonthSelect()
                            {
                                $currentMonth = date('n'); // Get the current month (1 to 12)

                                for ($month = 1; $month <= 12; $month++) {
                                    $monthName = date('F', mktime(0, 0, 0, $month, 1));
                                    $selected = ($month == $currentMonth) ? 'selected' : '';
                                    echo "<option value='$month' $selected>$monthName</option>";
                                }
                                echo '</select>';
                            }

                            generateMonthSelect();
                            ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="rent" class="form-label">Rent</label>
                        <select id="rent" name="rentSelect" class="form-select ps-2">
                            <option value="" selected>-- RENT --</option>
                        </select>
                    </div>

                    <div class="d-flex align-content-center justify-content-center mt-3">
                        <input type="submit" id="submitAssign" value="pay rent" class="btn btn-primary">
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
                        $('#unit').change(function() {
                            var unitId = $(this).val();
                            $.ajax({
                                url: "<?= site_url('assignTenant/getTenants') ?>",
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    unit_id: unitId
                                },
                                success: function(data) {
                                    $('#tenant').empty();
                                    $.each(data, function(index, tenant) {
                                        $('#tenant').append('<option value="' + tenant.id + '">' + tenant.name + '</option>');
                                    });
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error('Error fetching tenants:', textStatus, errorThrown);
                                }
                            });
                        });


                        $('#unit').change(function() {
                            var unitId = $(this).val();
                            $.ajax({
                                url: "<?= site_url('assignTenant/getRent') ?>",
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    unit_id: unitId
                                },
                                success: function(data) {
                                    $('#rent').empty();
                                    $.each(data, function(index, rent) {
                                        $('#rent').append('<option value="' + rent.rent + '">' + rent.rent + '</option>');
                                    });
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error('Error fetching tenants:', textStatus, errorThrown);
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