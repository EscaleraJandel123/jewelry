<!DOCTYPE html>
<html lang="en">

<?php echo include('chop/head.php'); ?>

<body>

<?php echo include('chop/header.php'); ?>

    <!-- ======= Sidebar ======= -->
    <?php echo include('chop/aside.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add products</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">

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


                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="categorySelect" name="category"
                                            aria-label="State">
                                            <?php foreach ($cat as $c): ?>
                                                <option value="<?= $c['categories'] ?>">
                                                    <?= $c['categories'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                            <!-- <option value="custom">Other...</option> -->
                                        </select>
                                        <label for="categorySelect">Category</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="floatingQuantity" name="quantity"
                                            placeholder="Quantity" required>
                                        <label for="floatingQuantity">Quantity</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPrize" name="prize"
                                            placeholder="Prize" required>
                                        <label for="floatingPrize">Prize</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image"
                                        onchange="previewImage()" required>
                                </div>
                                <!-- Image Preview -->
                                <div class="col-md-2" id="imagePreviewContainer" style="display: none;">
                                    <img id="imagePreview" alt="Image Preview"
                                        style="max-width: 100%; max-height: 200px;">
                                </div>
                                <!-- End Image Preview -->
                                <div class="text-center">
                                    <input class="btn btn-primary" type="submit">
                                    <a href="/items" class="btn btn-secondary">Reset</a>
                                </div>
                            </form><!-- End floating Labels Form -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body" style="height: 380px;">
                            <div class="col-md-10 mx-auto">
                                <h5 class="card-title">Category</h5>
                                <p>note: click to delete</p>
                                <div class="mb-4">
                                    <h6>Existing Categories:</h6>
                                    
                                    <?php foreach ($cat as $c): ?>
                                        <span class="badge bg-secondary mr-2 mb-2">
                                        <a href="/delcat/<?= $c['id'] ?>" style="color: white; text-decoration: none;"><?= $c['categories'] ?></a>
                                        </span>
                                    <?php endforeach; ?>
                                </div>

                                <form method="post" action="addcat" class="mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" name="newcat"
                                            placeholder="New Category" required>
                                        <label for="floatingName">Insert new category</label>
                                    </div>
                                    <button class="btn btn-primary mt-2" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->

    <?php echo include('chop/script.php'); ?>

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
    </script>
</body>

</html>