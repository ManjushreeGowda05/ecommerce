<?php
require_once "./config.php";
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $delete = "DELETE FROM products WHERE id = $product_id";
    if (mysqli_query($link, $delete)) {
        echo "<script>
            alert('Product deleted successfully!');
            window.location.href='manage-product.php';
            </script>";
    } else {
        echo "<script>
            alert('Error deleting product');
            window.location.href='manage-product.php';
            </script>";
    }
    exit();
}

header("Location: manage-product.php");
exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product - E-Commerce Admin</title>
    <?php include "./includes/header.php" ?>
</head>
<body>
    <?php include "./includes/navbar.php" ?>
    <div class="container py-5">
        <h2 class="mb-4">Delete Product</h2>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Delete Product
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./includes/footer.php" ?>
</body>
</html> 