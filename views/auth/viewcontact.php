<?php include '../../inc/header.php'; ?>
<?php include '../../inc/navbar.php'; ?>

<?php showMessage(); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (getcontact() as $contact): ?>
                            <tr>
                                <td><?= $contact['name'] ?></td>
                                <td><?= $contact['email'] ?></td>
                                <td><?= $contact['message'] ?></td>
                                <td>
                                    <form action='editcontact.php' method='GET'>
                                        <input type='hidden' name='id' value="<?php echo $contact['id']; ?>">
                                        <button type='submit' class='btn btn-warning btn-sm'>Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action='../../handlers/employees/handleDeleteContact.php' method='POST' onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                        <input type='hidden' name='id' value="<?php echo $contact['id']; ?>">
                                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty(getcontact())): ?>
                            <tr>
                                <td colspan="5" class="text-center">No contacts found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php require_once('../../inc/footer.php'); ?>