<?php 
require_once "../config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-secondary">
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Porto</a>
    <button class="navbar-toggler" type="button" data-bs-theme="dark" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">About Us</a>
        </li>
        <div class="me-2 ms-2">
          <a class="nav-link text-white" href="#">Register</a>
        </div>
        <?php if (isset($_SESSION['user'])) { ?>
        <div class="me-2 ms-2">
          <a class="nav-link text-white" href="#">Placeholder User</a>
        </div>
        <?php 
          $stmt = $con->prepare("SELECT price FROM product WHERE id = " . $_GET['id']);
          $stmt->execute();
          $result = $stmt->get_result();
          $data = $result->fetch_assoc();
          $total = $data['price'] * $_GET['quantity']; 
        } else {
        ?>
        <div class="me-2 ms-2">
          <a class="nav-link text-white" href="#">Login</a>
        </div> 
        <?php }?>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="card card-body ms-5 me-5" style="height: 100%">
    <div class="container">
      <h1 class="text-center">Checkout</h1>
    </div>
    <div class="container">
      
    </div>
  </div>
</div>
</body>
</html>