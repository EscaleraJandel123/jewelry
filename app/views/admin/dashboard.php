<!DOCTYPE html>
<html lang="en">

<?php echo include('chop/head.php'); ?>

<body>
  <!-- ======= Header ======= -->
  <?php echo include('chop/header.php'); ?>
  <!-- ======= Sidebar ======= -->
  <?php echo include('chop/aside.php'); ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Welcome Admin</h1>
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
        <div class="col-lg-10">
          <div class="row">
            <!-- daily sales -->
            <div class="col-xxl-6 col-md-8">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="dailySales">Loading...</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                // Fetch data from your CodeIgniter route
                fetch('/dailySales')
                  .then(response => response.json())
                  .then(data => {
                    // Display the total daily sales
                    document.getElementById('dailySales').textContent = data.total_sales || 0;
                  })
                  .catch(error => console.error('Error fetching data:', error));
              });
            </script>
            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-8">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Monthly</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="monthlySales">Loading...</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                // Fetch data from your CodeIgniter route
                fetch('/monthlySales')
                  .then(response => response.json())
                  .then(data => {
                    // Display the total monthly sales
                    const formattedMonthlySales = data.reduce((total, item) => total + parseFloat(item.total_sales), 0);
                    document.getElementById('monthlySales').textContent = '$ ' + formattedMonthlySales.toFixed(2);
                  })
                  .catch(error => console.error('Error fetching data:', error));
              });
            </script>
            <!-- Reports -->
            <div class="col-lg-12">
              <?php include('monthly.php') ?>
            </div>
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Recent Sales <span>| Today</span></h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date and Time</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($purchase_items as $g): ?>
                      <tr>
                        <th scope="row"><?= $g['purchase_id'] ?></th>
                        <td><?= $g['Customer'] ?></td>
                        <td><?= $g['Item_name'] ?></td>
                        <td>$<?= $g['quantity'] ?></td>
                        <td>$<?= $g['total_price'] ?></td>
                        <td><?= $g['order_at'] ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Top 10 Selling Products</h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($Topitems as $g): ?>
                      <tr>
                        <th scope="row"><a href="#"><img src="<?= BASE_URL . 'uploads/' . $g['max_image'] ?>" alt=""></a></th>
                        <td><?= $g['Item_name'] ?></td>
                        <td>$<?= $g['max_prize'] ?></td>
                        <td class="fw-bold"><?= $g['total_quantity'] ?></td>
                        <td>$<?= $g['total_sales'] ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>

        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <?php echo include('chop/script.php'); ?>

</body>

</html>