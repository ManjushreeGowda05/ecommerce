<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Home</title>
    <?php include "./includes/header.php" ?>
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0eafc 100%);
        }
        .hero {
            background: linear-gradient(120deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        }
        .product-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 16px 0 rgba(31, 38, 135, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .product-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }
        .footer {
            background: #2575fc;
            color: #fff;
            padding: 1.5rem 0 0.5rem 0;
            border-radius: 1.5rem 1.5rem 0 0;
        }
    </style>
</head>
<body>
    <?php include "./includes/navbar.php" ?>
    <!-- Hero Section -->
    <div class="container my-5">
        <div class="hero p-5 mb-5 text-center">
            <h1 class="display-4 fw-bold mb-3">Welcome to E-Commerce</h1>
            <p class="lead mb-4">Discover the best products at unbeatable prices. Shop now and enjoy fast delivery, secure checkout, and top-notch customer service!</p>
            <a href="#products" class="btn btn-light btn-lg px-4 fw-semibold shadow-sm">Shop Now <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="container pb-5" id="products">
        <h2 class="mb-4 text-center fw-bold">Our Products</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Product 1 -->
            <div class="col">
                <div class="product-card card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text text-primary fw-semibold">$19.99</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i> View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col">
                <div class="product-card card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text text-primary fw-semibold">$29.99</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i> View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col">
                <div class="product-card card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text text-primary fw-semibold">$39.99</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i> View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more products as needed -->
        </div>
    </div>

    <!-- Footer -->
    <?php include "./includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 