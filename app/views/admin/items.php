<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/bootstrap-icons/bootstrap-icons.css' ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/boxicons/css/boxicons.min.css' ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/quill/quill.snow.css' ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/quill/quill.bubble.css' ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/remixicon/remixicon.css' ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/simple-datatables/style.css' ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo BASE_URL . PUBLIC_DIR . '/assets/css/style.css' ?>" rel="stylesheet">


    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="/dashboard" class="logo d-flex align-items-center">
    <img src="public/assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">AdminDashboard</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

   

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="public/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Kevin Anderson</h6>
          <span>Admin</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>


        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/products">
                            <i class="bi bi-circle"></i><span>Products</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Add products</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/items">
                            <i class="bi bi-circle"></i><span>Items</span>
                        </a>
                    </li>
                    <!-- <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li> -->
                </ul>
            </li><!-- End Tables Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Daily</span>
                        </a>
                    </li>
                    <li>
                        <a href="cha">
                            <i class="bi bi-circle"></i><span>Weekly</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Monthly</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Yearly</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/modify">
                            <i class="bi bi-circle"></i><span>Modify Products</span>
                        </a>
                    </li>
                    <!-- <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li> -->
                </ul>
            </li><!-- End Icons Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add products</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="/save" method="post" enctype="multipart/form-data"
                                id="imageForm">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" name="name"
                                            placeholder="Item Name" required>
                                        <label for="floatingName">Item Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="description" placeholder="Description"
                                            id="floatingTextarea" style="height: 100px;" required></textarea>
                                        <label for="floatingTextarea">Item Description</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" name="category"
                                            aria-label="State">
                                            <?php foreach ($cat as $c): ?>
                                                <option value="<?= $c['categories'] ?>">
                                                    <?= $c['categories'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="floatingSelect">Category</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="floatingQuantity" name="quantity"
                                            placeholder="Quantity" required>
                                        <label for="floatingQuantity"  >Quantity</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPrize" name="prize"
                                            placeholder="Prize" required>
                                        <label for="floatingPrize"  >Prize</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image"
                                        onchange="previewImage()" required >
                                </div>
                                <!-- Image Preview -->
                                <div class="col-md-2" id="imagePreviewContainer" style="display: none;">
                                    <img id="imagePreview" alt="Image Preview"
                                        style="max-width: 100%; max-height: 200px;">
                                </div>
                                <!-- End Image Preview -->
                                <div class="text-center">
                                    <input class="btn btn-primary" type="submit">
                                    <button type="reset" class="btn btn-secondary" onclick="resetForm()">Reset</button>
                                </div>
                            </form><!-- End floating Labels Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/apexcharts/apexcharts.min.js' ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/chart.js/chart.umd.js' ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/echarts/echarts.min.js' ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/quill/quill.min.js' ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/simple-datatables/simple-datatables.js' ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/tinymce/tinymce.min.js' ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/vendor/php-email-form/validate.js' ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo BASE_URL . PUBLIC_DIR . '/assets/js/main.js' ?>"></script>
    <script>
        function previewImage() {
            var input = document.getElementById('formFile');
            var imagePreview = document.getElementById('imagePreview');
            var imagePreviewContainer = document.getElementById('imagePreviewContainer');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function resetForm() {
            document.getElementById('imageForm').reset(); // Reset the form
            document.getElementById('imagePreviewContainer').style.display = 'none'; // Hide the image preview
        }
    </script>
</body>

</html>