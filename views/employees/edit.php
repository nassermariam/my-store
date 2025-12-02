<?php include '../../inc/header.php';
include '../../inc/navbar.php'; ?>

<?php showMessage(); ?>

<?php
$id = $_GET['id'];
$products = getproduct();
$product = false;

foreach ($products as $product) {
    if ($product['id'] == $id) {
        $product = $product;
        break;
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Edit Product</h3>
                </div>
                <div class="card-body">
                    <form action="../../handlers/employees/handleUpdate.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control"
                                name="name"
                                value="<?php echo $product['name']; ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price ($)</label>
                            <input type="number" class="form-control"
                                name="price"
                                value="<?php echo $product['price']; ?>"
                                min="0" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category" required>
                                <option disabled>Select category</option>
                                <option value="electronics" <?php if ($product['category'] == "electronics") echo "selected"; ?>>Electronics</option>
                                <option value="fashion" <?php if ($product['category'] == "fashion") echo "selected"; ?>>Fashion</option>
                                <option value="home" <?php if ($product['category'] == "home") echo "selected"; ?>>Home</option>
                                <option value="books" <?php if ($product['category'] == "books") echo "selected"; ?>>Books</option>
                                <option value="other" <?php if ($product['category'] == "other") echo "selected"; ?>>Other</option>
                            </select>
                        </div>
                        <!-- 
                        <div class="mb-3">
                            
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <small>Current: /* ?></small>
                        </div> -->
                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">

                            <?php if (!empty($product['image'])): ?>
                                <p>Current:</p>
                                <img src="/../../public/<?php echo $product['image']; ?>" alt="Current Image" style="max-width:150px;">
                            <?php endif; ?>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="5" required><?php echo $product['description']; ?></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" name="submit_product" class="btn btn-success">
                                Update Product
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../../inc/footer.php'); ?>