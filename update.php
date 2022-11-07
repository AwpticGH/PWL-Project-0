<?php
    require "config.php";
    if (!isset($_GET['id']) || $_GET['id'] == null) header("location:index.php");

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id']) && $_GET['id'] != null) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM airports WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $id = $_POST['id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $province = $_POST['province'];
        $city = $_POST['city'];

        $sql = "UPDATE airports SET 
                code = '$code',
                name = '$name',
                province = '$province',
                city = '$city'
                WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) header("location:index.php");

        echo "Something Went Wrong On The Update";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .input-group-append {
                cursor: pointer;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css"> 
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Home</a>
              <a class="nav-link" href="create.php">Create</a>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </nav>

        <!-- Begin page content -->
        <main class="flex-shrink-0">
            <div class="container">
                <h1 class="mt-5">Update Airport Detail</h1>
                <p class="lead">Airport Detail</p>
                <div class="row pt-5">
                    <div class="col-12">
                        <form method="POST" action="update.php">
                            <?php while ($data = mysqli_fetch_array($query)) { ?>
                                <input type="hidden" name="id" value="<?= $data['id'] ?>" />
                                <div class="mb-3">
                                    <label class="form-label">Code</label>
                                    <input type="text" class="form-control" 
                                            name="code"
                                            value="<?= $data['code'] ?>"
                                            >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" 
                                            name="name"
                                            value="<?= $data['name'] ?>"
                                            >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Province</label>
                                    <input type="text" class="form-control" 
                                            name="province" 
                                            value="<?= $data['province'] ?>"
                                            >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" value="<?= $data['city'] ?>" >
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" onclick="confirm('Are You Sure to Update?')" value="Update">
                                    <a href="index.php" class="btn btn-danger">Cancel</a>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>