<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - E-Commerce</title>
    <?php include "./includes/header.php" ?>
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0eafc 100%);
        }
        .checkout-card {
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.08);
            background: #fff;
        }
        .order-summary {
            border-radius: 1rem;
            background: #f1f6fb;
            box-shadow: 0 2px 8px 0 rgba(31, 38, 135, 0.05);
        }
    </style>
</head>
<body>
    <?php include "./includes/navbar.php" ?>
    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-center"><i class="bi bi-credit-card"></i> Checkout</h2>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="checkout-card card p-4 mb-4">
                    <h5 class="fw-bold mb-3">Shipping Address</h5>
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="123 Main St" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                            <div class="col-md-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" required>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="zip" required>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3 mt-4">Payment Method</h5>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" checked>
                                <label class="form-check-label" for="creditCard">
                                    <i class="bi bi-credit-card"></i> Credit Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                                <label class="form-check-label" for="paypal">
                                    <i class="bi bi-paypal"></i> PayPal
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required>
                            </div>
                            <div class="col-md-3">
                                <label for="expiry" class="form-label">Expiry</label>
                                <input type="text" class="form-control" id="expiry" placeholder="MM/YY" required>
                            </div>
                            <div class="col-md-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" placeholder="123" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-3">Place Order <i class="bi bi-check-circle"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-summary p-4 mb-4">
                    <h5 class="fw-bold mb-3">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Items (3)</span>
                        <span>$79.97</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>
                        <span>$5.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">Total</span>
                        <span class="fw-bold text-primary">$84.97</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./includes/navbar.php" ?>
</body>
</html> 