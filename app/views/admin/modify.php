<!DOCTYPE html>
<html lang="en">

<?php echo include('chop/head.php'); ?>

<body>

    <?php echo include('chop/header.php'); ?>

    <!-- ======= Sidebar ======= -->
    <?php echo include('chop/aside.php'); ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Modify Items</h1>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($prod as $pr): ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= $pr['id'] ?>
                                                </th>

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
                                                    <img src="<?= BASE_URL . 'uploads/' . $pr['image'] ?>" alt="asd"
                                                        style="max-width: 70px; cursor: pointer;">
                                                </td>
                                                <td>
                                                ₱
                                                    <?= $pr['prize'] ?>
                                                </td>
                                                <td>
                                                    <?= $pr['date'] ?>
                                                </td>
                                                <td><a href="/edit/<?= $pr['id'] ?>" type="button"
                                                        class="btn btn-outline-warning">Edit</a>
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
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <!-- Floating Labels Form -->
                            <form class="row g-3"
                                action="/<?= (isset($edit['id'])) ? "submitedit/" . $edit['id'] : " " ?>" method="post"
                                enctype="multipart/form-data" id="imageForm">

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" name="name"
                                            placeholder="Item Name"
                                            value="<?= (isset($edit['name'])) ? $edit['name'] : "" ?>" required>
                                        <label for="floatingName">Item Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea required class="form-control" name="description"
                                            placeholder="Description" id="floatingTextarea"
                                            style="height: 100px;"><?= (isset($edit['description'])) ? $edit['description'] : "" ?></textarea>
                                        <label for="floatingTextarea">Item Description</label>
                                    </div>
                                </div>
                                <!-- Category here -->
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" name="category"
                                            aria-label="State" required>
                                            <option value="">Select</option>
                                            <?php foreach ($cat as $c): ?>
                                                <option value="<?= $c['categories'] ?>" <?= (isset($edit['category']) && $edit['category'] == $c['categories']) ? "selected" : "" ?>>
                                                    <?= $c['categories'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="floatingSelect">Category</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input min="1" type="number" class="form-control" id="floatingQuantity"
                                            name="quantity" placeholder="Quantity"
                                            value="<?= (isset($edit['quantity'])) ? $edit['quantity'] : "" ?>" required>
                                        <label for="floatingQuantity">Quantity</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPrize" name="prize"
                                            placeholder="Prize"
                                            value="<?= (isset($edit['prize'])) ? $edit['prize'] : "" ?>" required>
                                        <label for="floatingPrize">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image"
                                        onchange="previewImage()">
                                </div>
                                <?php if (isset($edit['image']) && !empty($edit['image'])): ?>
                                    <div class="col-md-12" id="imagePreviewContainer" style="display: block;">
                                        <img id="imagePreview" src="<?= BASE_URL . 'uploads/' . $edit['image'] ?>"
                                            alt="Image Preview" style="max-width: 300px; max-height: 300px;">
                                    </div>
                                <?php else: ?>
                                    <!-- Image Preview Container (hidden by default) -->
                                    <div class="col-md-12" id="imagePreviewContainer" style="display: none;">
                                        <img id="imagePreview" alt="Image Preview"
                                            style="max-width: 300px; max-height: 300px;">
                                    </div>
                                <?php endif; ?>


                                <!-- End Image Preview -->
                                <div class="text-center">
                                    <input class="btn btn-primary" type="submit"
                                        value="<?= (isset($edit['id'])) ? "Update" : "Update" ?>">
                                    <a href="/modify" type="reset" class="btn btn-secondary"
                                        onclick="resetForm()">Reset</a>
                                </div>
                            </form><!-- End floating Labels Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

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
        function resetForm() {
            document.getElementById('imageForm').reset(); // Reset the form
            document.getElementById('imagePreviewContainer').style.display = 'none'; // Hide the image preview
        }
    </script>
</body>

</html>