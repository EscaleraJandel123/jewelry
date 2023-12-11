<!DOCTYPE html>
<html lang="en">

<?php include('chop/head.php'); ?>

<body>
    <!-- ======= Header ======= -->
    <?php include('chop/header.php'); ?>
    <!-- ======= Sidebar ======= -->
    <?php include('chop/aside.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Reports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?= '₱' . number_format($today, 2) ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| This Week</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-wallet2"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?= '₱' . number_format($weekly, 2) ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cash-stack"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?= '₱' . number_format($monthly, 2) ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->

                        <!-- Yearly Revenue Card -->
                        <div class="col-xxl-6 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| This Year</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bar-chart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?= '₱' . number_format($yearly, 2) ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| Over All</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bar-chart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?= '₱' . number_format($yearly, 2) ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card">
    <div class="card-body">
        <h5 class="card-title">This Week Sales</h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Today</th>
                    <th scope="col">Weekly</th>
                    <th scope="col">Monthly</th>
                    <th scope="col">Over Allsales</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= '₱' . number_format($today, 2) ?>
                    </td>
                    <td>
                        <?= '₱' . number_format($weekly, 2) ?>
                    </td>
                    <td>
                        <?= '₱' . number_format($monthly, 2) ?>
                    </td>
                    <td>
                        <?= '₱' . number_format($overall_sales, 2) ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <form id="downloadForm" method="post" action="/downloadReportsPdf">
            <input type="hidden" name="today" value="<?= $today ?>">
            <input type="hidden" name="weekly" value="<?= $weekly ?>">
            <input type="hidden" name="monthly" value="<?= $monthly ?>">
            <input type="hidden" name="overall_sales" value="<?= $overall_sales ?>">
            <div class="d-grid gap-2 mt-3">
                <!-- Update the onclick event to submit the form -->
                <button class="btn btn-primary" type="button" onclick="submitForm()">Download Reports</button>
            </div>
        </form>

        <!-- End Table with hoverable rows -->
    </div>
</div>

<script>
function submitForm() {
    // Submit the form when the button is clicked
    document.getElementById("downloadForm").submit();
}
</script>

                </div>
            </div>
        </section>
    </main>
    <?php include('chop/script.php'); ?>

</body>

</html>