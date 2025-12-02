<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>
<?php showMessage();
?>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php foreach (getproduct() as $product): ?>
                <div class="col mb-5">
                    <div class="card h-100">

                        <!-- Product details -->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name -->
                                <h5 class="fw-bolder"><?php echo htmlspecialchars($product['name'] ?? 'No Name'); ?></h5>

                                <!-- Product price -->
                                $<?php echo number_format($product['price'] ?? 0, 2); ?>
                            </div>
                            <img src="public/<?php echo $product['image']; ?>" alt="Current Image" style="max-width:150px;">

                            <!-- Product description -->
                            <p><?php echo htmlspecialchars($product['description'] ?? ''); ?></p>

                            <!-- Product category -->
                            <small class="text-muted"><?php echo htmlspecialchars($product['category'] ?? ''); ?></small>
                        </div>

                        <!-- Product actions -->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <form method="post" action="handlers/employees/handleAddToCart.php">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id'] ?? ''); ?>">
                                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name'] ?? ''); ?>">
                                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price'] ?? 0); ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>


<?php require_once('inc/footer.php'); ?>