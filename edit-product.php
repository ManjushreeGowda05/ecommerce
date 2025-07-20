<?php
require_once "./config.php";
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $select = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($link, $select);
    $product = mysqli_fetch_array($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['product_price'];
    $category = $_POST['category'];
    
    // Handle image upload
    $image_path = $product['image_path']; // Default to existing image
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        }
    }
    
    $update = "UPDATE products SET 
               name = '$name', 
               description = '$description', 
               product_price = $price, 
               category = '$category', 
               image_path = '$image_path' 
               WHERE id = $id";
    if (mysqli_query($link, $update)) {
        echo "<script>alert('Product updated successfully!'); window.location.href='manage-product.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error updating product');</script>";
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