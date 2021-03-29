<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>PHP TEST</title>
</head>
<body>
    <?php
    require_once 'delete_items.php';
    ?>
    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Product List</h2>
                </div>
                <div class="col">
                </div>
                <div class="col text-right">
                    <a href="add.php">
                        <button class="btn btn-primary mr-1">Add</button>
                    </a>
                    <a href="#">
                        <button
                            class="btn btn-danger"
                            name="delete_items"
                            type="submit"
                            form="delete_form"
                        >Mass Delete</button>
                    </a>
                </div>
            </div>

            <hr />
            <form id="delete_form" action="delete_items.php" method="post">
                <div class="row justify-content-start">
                    <?php
                    include 'functions.php';
                    showProducts();
                    ?>
                </div>
            </form>
        </div>

        <hr />
        <div class="row justify-content-center">Scandiweb Test assignment</div>
    </div>
</body>
</html>