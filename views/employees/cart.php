<?php
include '../../inc/header.php';
include '../../inc/navbar.php';
$corePath = __DIR__ . '/../../core/function.php';
require_once $corePath;

showMessage();

$cart = getCart(); // جلب السلة من ملف data/cart.json
$total = 0;
?>

<!-- Header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Your Cart</h1>
            <p class="lead fw-normal text-white-50 mb-0">Check your selected products</p>
        </div>
    </div>
</header>

<!-- Cart Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <?php if (!empty($cart)): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $item):
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['price']; ?></td>
                                    <td><?php echo $item['quantity']; ?></td>
                                    <td><?php echo $subtotal; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <h3>Total: <?php echo $total; ?></h3>

                    <form action='../../handlers/employees/handleCheckout.php' method='POST'>
                        <button type='submit' class='btn btn-success'>Checkout</button>
                    </form>


                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php require_once('../../inc/footer.php'); ?>