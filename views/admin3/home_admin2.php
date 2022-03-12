<div class="d-sm-flex align-items-center justify-content-between my-4">
    <h1 class="h3 text-light "><i class="fas fa-fw fa-tachometer-alt"></i> <?php language_content("Statistique", "Dasboard") ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>


<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary bg-transparent border-0 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1"><?php language_content("Nombre d'employés", "Number of employees") ?></div>
                        <div class="h5 mb-0 text-light h4"><?= count_employee($db) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
                <div class="row mt-3">
                    <a class="btn btn-outline-primary float-right" href="admin3.php?page=views/admin3/employees/list_employee"><?= language_content("Détails", "Details") ?></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success bg-transparent border-0  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md  font-weight-bold text-success text-uppercase mb-1"><?php language_content("Nombre Fichiers", "Number of file") ?></div>
                        <div class="h5 mb-0 text-light h4"><?= count_files($db) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-alt fa-2x  text-success"></i>
                    </div>
                </div>
                <div class="row mt-3">
                    <a class="btn btn-outline-success float-right" href="admin3.php?page=views/admin3/company_files/list_files"><?= language_content("Détails", "Details") ?></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info bg-transparent border-0 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md  font-weight-bold text-info text-uppercase mb-1"><?php language_content("Employés en ligne", "online employees") ?></div>
                        <div class="h5 mb-0 text-light h4"><?= count_online_employee($db) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class=" fas fa-user-tag fa-2x text-info"></i>
                    </div>
                </div>
                <div class="row mt-3">
                    <a class="btn btn-outline-info float-right" href="#"><?= language_content("Détails","Details")?></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info bg-transparent border-0 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md  font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 text-light h4">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-info"></i>
                    </div>
                </div>
                <div class="row mt-3">
                    <a class="btn btn-outline-info float-right" href="#"><?= language_content("Détails", "Details") ?></a>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning bg-transparent border-0 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md  font-weight-bold text-warning text-uppercase mb-1"><?php language_content("Nombre de direction", "Number of directions") ?></div>
                        <div class="h5 mb-0 text-light h4"><?= count_direction($db) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class=" fas fa-user-tie fa-2x text-warning"></i>
                    </div>
                </div>
                <div class="row mt-3">
                    <a class="btn btn-outline-warning float-right" href="admin3.php?page=views/admin3/directions/list_directions"><?= language_content("Détails","Details")?></a>
                </div>
            </div>
        </div>
    </div>
</div>


