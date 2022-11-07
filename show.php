<?php 
    require_once "config.php";
    if (!isset($_GET['id']) || $_GET['id'] == null) header("location:index.php");
    $id = $_GET['id'];

    $sql = "SELECT * FROM airports WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
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
                <h1 class="mt-5">Show Airport Detail</h1>
                <p class="lead">Airport Detail</p>
                <div class="row pt-5">
                    <div class="col-12">
                        <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" 
                                    name="id" readonly
                                    value="<?= $data['id'] ?>"
                                    >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" class="form-control" 
                                    name="code" readonly
                                    value="<?= $data['code'] ?>"
                                    >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" 
                                    name="name" readonly
                                    value="<?= $data['name'] ?>"
                                    >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Province</label>
                            <input type="text" class="form-control" 
                                    name="province" readonly
                                    value="<?= $data['province'] ?>"
                                    >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" 
                                    name="city" readonly
                                    value="<?= $data['city'] ?>"
                                    >
                        </div>
                        <div class="mb-3">
                            <a href="index.php" class="btn btn-success">Back</a>
                            <a href="update.php?id=<?= $data['id'] ?>" class="btn btn-primary">Update</a>
                            <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>