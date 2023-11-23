<!DOCTYPE html>
<html lang="en">

<?php echo include('chop/head.php'); ?>

<body>

<?php echo include('chop/header.php'); ?>

    <!-- ======= Sidebar ======= -->
    <?php echo include('chop/aside.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Image</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Category</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Prize</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($prod as $pr): ?>
                      <tr>
                        <th scope="row"><?= $pr['id'] ?></th>
                        <td>
                          <img src="<?= BASE_URL . 'uploads/' . $pr['image'] ?>" alt="asd"
                            style="max-width: 70px; cursor: pointer;">
                        </td>
                        <td>
                          <?= $pr['name'] ?>
                        </td>
                        <td>
                          <?= $pr['description'] ?>
                        </td>
                        <td>
                          <?= $pr['category'] ?>
                        </td>
                        <td>
                          <?= $pr['quantity'] ?>
                        </td>
                        <td>
                          <?= $pr['prize'] ?>
                        </td>
                        <td>
                          <?= $pr['date'] ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- End Table with stripped rows -->

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

  <?php echo include('chop/script.php'); ?>

</body>

</html>