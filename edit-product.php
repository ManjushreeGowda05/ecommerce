<?php
require_once "./config.php";
session_start();

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: manage-product.php'); exit;
}
$product_id = intval($_GET['id']);
$select = "SELECT * FROM products WHERE id = ?";
$stmt = mysqli_prepare($link, $select);
mysqli_stmt_bind_param($stmt, "i", $product_id);
mysqli_stmt_execute($stmt);
$product = mysqli_stmt_get_result($stmt)->fetch_assoc();
mysqli_stmt_close($stmt);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = intval($_POST['id']);
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $price = floatval($_POST['product_price']);
        $category = trim($_POST['category']);
        $image_path = $product['image_path'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Validate file
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['image']['tmp_name']);
            finfo_close($finfo);

            if (!in_array($mime, ['image/jpeg','image/png','image/gif'])) {
                throw new Exception('Only JPEG, PNG, GIF allowed');
            }
            if ($_FILES['image']['size'] > 2*1024*1024) {
                throw new Exception('File too large');
            }

            // Sanitize and store
            $ext = preg_replace('/[^A-Za-z0-9]/','',pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $newName = uniqid('', true) . ".$ext";
            $uploadDir = __DIR__ . '/../secure_uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755);
            $destination = $uploadDir . $newName;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                throw new Exception('Upload error');
            }
            chmod($destination, 0644);
            $image_path = 'uploads/' . $newName;
        }

        // Prepare and execute update
        $stmt = mysqli_prepare($link, "
            UPDATE products SET
              name=?, description=?, product_price=?, category=?, image_path=?
            WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssdssi", $name, $description, $price, $category, $image_path, $id);
        if (!mysqli_stmt_execute($stmt)) throw new Exception('DB error');
        mysqli_stmt_close($stmt);

        echo "<script>alert('Product updated successfully!'); window.location='manage-product.php';</script>"; exit;

    } catch (Exception $e) {
        echo "<script>alert('**Error:** " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - E-Commerce Admin</title>
    <?php include "./includes/header.php" ?>
</head>
<body>
    <?php include "./includes/navbar.php" ?>
    <div class="container py-5">
        <h2 class="mb-4">Edit Product</h2>
        <form id="editProductForm" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="mb-3">
                <label for="editProductName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="editProductName" name="name" value="<?php echo $product['name']; ?>" required>
                <div class="invalid-feedback">Please enter the product name.</div>
            </div>
            <div class="mb-3">
                <label for="editProductDescription" class="form-label">Description</label>
                <textarea class="form-control" id="editProductDescription" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
                <div class="invalid-feedback">Please enter a description.</div>
            </div>
            <div class="mb-3">
                <label for="editProductPrice" class="form-label">Price ($)</label>
                <input type="number" class="form-control" id="editProductPrice" name="product_price" min="0" step="0.01" value="<?php echo $product['product_price']; ?>" required>
                <div class="invalid-feedback">Please enter a valid price.</div>
            </div>
            <div class="mb-3">
                <label for="editProductCategory" class="form-label">Category</label>
                <input type="text" class="form-control" id="editProductCategory" name="category" value="<?php echo $product['category']; ?>" required>
                <div class="invalid-feedback">Please enter a category.</div>
            </div>
            <div class="mb-3">
                <label for="editProductImage" class="form-label">Product Image</label>
                <input class="form-control" type="file" id="editProductImage" name="image" accept="image/*">
                <div class="form-text">Current image: <img src="<?php echo $product['image_path']; ?>" alt="Current Product" class="img-thumbnail" style="height: 70px;"></div>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    <?php include "./includes/footer.php" ?>
    <script>
        document.getElementById('editProductForm').addEventListener('submit', function(event) {
            var form = this;
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    </script>
</body>
</html>