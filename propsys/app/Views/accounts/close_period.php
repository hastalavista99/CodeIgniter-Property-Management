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
                    <a href="accounts" class="btn btn-success">
                        <i class="material-icons opacity-10">chevron_left</i>
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="row d-flex justify-content-between align-items-center ms-2 me-2">
                <div class="col-sm-12 col-md-6 mt-1">

                </div>

            </div>

            <div class="col-12 d-flex align-items-center justify-content-center mt-2">

                <div class="col-3">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#closeMonthModal">Close Month</button>
                </div>
                <div class="col-3">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#closeYearModal">Close Year</button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Close Month Modal -->
<div class="modal" id="closeMonthModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Close Month</h5>
                <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row g-3 my-1">
                    <div class="col-md-4">
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
                    </div>

                    <div class="col-md-4">
                        <label for="rentYearSelect" class="form-label">Year:</label>
                        <select name="rentYear" id="rentYearSelect" class="form-select ps-2" disabled>
                            <?php
                            function generateYearSelect()
                            {
                                $currentYear = date('Y'); // Get the current year


                                for ($year = $currentYear - 10; $year <= $currentYear + 10; $year++) {
                                    $selected = ($year == $currentYear) ? 'selected' : '';
                                    echo "<option value='$year' $selected>$year</option>";
                                }
                                echo '</select>';
                            }

                            // Example usage
                            generateYearSelect();
                            ?>
                    </div>

                    <div class="col-12 d-flex align-content-end justify-content-end me-2">
                        <button type="button" name="tenant" class="btn btn-primary" onclick="addTenant()">close</button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="modal" id="closeYearModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Close Year</h5>
                <button type="button" class="btn-close me-2" style="background-color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row g-3 my-1">
                    <div class="col-md-6">
                        <label for="rentYearSelect" class="form-label">Year:</label>
                        <select name="rentYear" id="rentYearSelect" class="form-select ps-2">
                            <?php
                            function yearSelect()
                            {
                                $currentYear = date('Y'); // Get the current year


                                for ($year = $currentYear - 10; $year <= $currentYear + 10; $year++) {
                                    $selected = ($year == $currentYear) ? 'selected' : '';
                                    echo "<option value='$year' $selected>$year</option>";
                                }
                                echo '</select>';
                            }

                            // Example usage
                            yearSelect();
                            ?>
                    </div>

                    <div class="col-12 d-flex align-content-end justify-content-end me-2">
                        <button type="button" name="tenant" class="btn btn-primary">close</button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?= $this->endSection() ?>