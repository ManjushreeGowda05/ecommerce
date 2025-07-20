<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - E-Commerce</title>
    <?php include "./includes/header.php" ?>
</head>
<body>
    <?php include "./includes/navbar.php" ?>
    <div class="container py-5">
        <h1 class="mb-4">Contact Us</h1>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="contactName" class="form-label">Name</label>
                <input type="text" class="form-control" id="contactName" required>
            </div>
            <div class="col-md-6">
                <label for="contactEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="contactEmail" required>
            </div>
            <div class="col-12">
                <label for="contactMessage" class="form-label">Message</label>
                <textarea class="form-control" id="contactMessage" rows="4" required></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 