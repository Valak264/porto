<?php 
require_once 'config.php';
$stmt = $con->prepare("SELECT * FROM product");
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function limit(qValue) {
        let limit = qValue;
        if (limit > 1000) {
          document.getElementById("quantity").value = 1000;
        } else if (limit <= 0) {
          document.getElementById("quantity").value = 1;
        }
      }
    </script>
    <title>Home</title>
    <style>
      .img-sizing {
        height: 310px;
        width: 100%;
      }
    </style>
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
      </ul>
      <div class="me-2 ms-2">
        <a class="nav-link text-white" href="#">Register</a>
      </div>
      <div class="me-2 ms-2">
        <a class="nav-link text-white" href="#">Login</a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
  <div class="card card-body ms-5 me-5" style="height: 100%">
    <div class="container">
      <h1 class="text-center">Welcome to our simple bookstore !</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php if ($result->num_rows > 0) { 
        while ($data = $result->fetch_assoc()) { ?>
      <div class="col">
        <div class="card h-100">
          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['pic']); ?>" class="card-img-top img-sizing" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data['product_name'];?></h5>
            <p class="card-text"><?php echo $data['description'];?><br/>
              Author : <?php echo $data['author'];?><br/>
              Price : Rp. <?php echo number_format($data['price']);?><br/>
              Stock Available : <?php echo $data['quantity'];?><br/>
            </p>

            <form action="checkout/" method="get">
              <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="hidden" name="id" value="<?php echo $data['id']?>">
                <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?php echo $data['quantity'];?>" class="form-control" oninput="limit(this.value)" required>
                <br/>
                <input type="submit" class="btn btn-success" name="buy" id="submit-btn" value="Buy">
                <input type="submit" class="btn btn-warning" name="addtocart" id="submit-btn" value="Add to Cart">
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php }} else {?>
          <div class="container">
            <h2 class="text-center">Sorry ! There is nothing to show for the momentarily !</h2>
          </div>
      <?php } ?>
    </div>
  </div>
</div>

</body>
</html>
