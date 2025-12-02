<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/my-store">EraaSoft PMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/my-store">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/my-store/views/auth/about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/my-store/views/auth/contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/my-store/views/employees/creatproduct.php">product</a></li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav mr-auto mb-2 mb-lg-0 ms-lg-4">
                <?php if (isset($_SESSION['user'])):
                    // compute cart totals using data/cart.json
                    $_cart = function_exists('getCart') ? getCart() : [];
                    $cartCount = 0;
                    $cartTotal = 0.0;
                    foreach ($_cart as $citem) {
                        $qty = isset($citem['quantity']) ? intval($citem['quantity']) : 1;
                        $price = isset($citem['price']) ? floatval($citem['price']) : 0.0;
                        $cartCount += $qty;
                        $cartTotal += $qty * $price;
                    }
                ?>
                    <form class="d-flex" action="/my-store/views/employees/cart.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $cartCount; ?></span>
                            <small class="text-muted ms-2">$<?php echo number_format($cartTotal, 2); ?></small>
                        </button>

                    </form>



                    <li class="nav-item"><a class="nav-link" href="/my-store/handlers/handlerLogout.php">logout</a></li>

                <?php else : ?>

                    <li class="nav-item"><a class="nav-link" href="/my-store/views/auth/login.php">login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/my-store/views/auth/register.php">register</a></li>
                <?php endif; ?>

            </ul>

            </ul>
        </div>
    </div>
</nav>