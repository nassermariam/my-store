<?php include '../../inc/header.php';
include '../../inc/navbar.php'; ?>

<?php showMessage(); ?>

<?php
$id = $_GET['id'];
$contacts = getcontact(); // اسم صح ومش هنبوازه
$contact = false; // هنستعمله بس للـ selected contact

foreach ($contacts as $c) { // استخدم متغير مختلف
    if ($c['id'] == $id) {
        $contact = $c;
        break;
    }
}

if ($contact === false) {
    die("Contact not found");
}
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Edit Contact</h3>
                </div>
                <div class="card-body">
                    <form action="../../handlers/employees/handleUpdateContact.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control"
                                name="name"
                                value="<?php echo $contact['name']; ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">email</label>
                            <input type="text" class="form-control"
                                name="email"
                                value="<?php echo $contact['email']; ?>"
                                required>
                        </div>





                        <div class="mb-3">
                            <label class="form-label">message</label>
                            <textarea class="form-control" name="message" rows="5" required><?php echo $contact['message']; ?></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" name="submit_contact" class="btn btn-success">
                                Update Contact
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../../inc/footer.php'); ?>