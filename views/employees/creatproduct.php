<?php include '../../inc/header.php';
include '../../inc/navbar.php'; ?>
<?php showMessage();
?> <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Create Product</h3>
                </div>
                <div class="card-body">
                    <form action="../../handlers/employees/handleCreateProduct.php" method="POST" enctype="multipart/form-data">
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="name" placeholder="Enter product name" required>
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price ($)</label>
                            <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter product price" min="0" step="0.01" required>
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="productCategory" class="form-label">Category</label>
                            <select class="form-select" id="productCategory" name="category" required>
                                <option value="" selected disabled>Select category</option>
                                <option value="electronics">Electronics</option>
                                <option value="fashion">Fashion</option>
                                <option value="home">Home</option>
                                <option value="books">Books</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="image" accept="image/*" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" name="description" rows="5" placeholder="Write a short description..." required></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="submit_product" class="btn btn-success">
                                <i class="bi bi-plus-circle me-1"></i> Create Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../../inc/footer.php'); ?>