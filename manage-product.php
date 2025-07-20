<?php
require_once "./config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - E-Commerce Admin</title>
    <?php include "./includes/header.php" ?>
</head>
<body>
    <?php include "./includes/navbar.php" ?>
    <div class="container py-5">
        <h2 class="mb-4">Manage Products</h2>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = "SELECT * FROM products";
                    $result = mysqli_query($link, $select);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['name']; ?>" class="img-thumbnail" style="height: 60px;"></td>
                                <td><?php echo $row['name']; ?></td>
                                <td>$<?php echo $row['price']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td>
                                    <a href="edit-product.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete-product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="5">No products found</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include "./includes/footer.php" ?>
</body>
</html>