<?php require_once('../../inc/header.php'); ?>
<?php require_once('../../inc/navbar.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }
    </style>

</head>

<body class="bg-light">
    <?php showMessage();
    ?>
    <div class="container mt-3 mb-5">

        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="mb-4 text-center">Login</h3>

                <form action="../../handlers/handlerLogin.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>



<?php require_once('../../inc/footer.php'); ?>