<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="accounting.js"></script>
    <title>Add Item</title>
    <script type="text/javascript">

      function f_number(valueOfPrice) {
        let val = accounting.formatNumber(valueOfPrice);
        document.getElementById("price").value = val;
        document.getElementById("true-price").value = accounting.unformat(val);
      }

      function validate(input) {

        let pattern = /[%\d;@&()"{}]+/g;
        let result = pattern.test(input);

        if (result) {
          document.getElementById("submit-btn").disabled = true;
        } else {
          document.getElementById("submit-btn").disabled = false;
        }
      }

      function limit(qValue) {
        let limit = qValue;
        if (limit > 1000) {
          document.getElementById("quantity").value = 1000;
        } else if (limit <= 0) {
          document.getElementById("quantity").value = 1;
        }
      }
        
    </script>
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
          <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">About Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="container w-75 mt-5 mb-5">
    <div class="card card-body ms-5 me-5" style="height: 100%">
    <form action="add_item.php" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label class="form-label">Product Name</label>
      <input type="text" class="form-control" name="product_name" id="product" placeholder="e.g Programming Basic with Python" oninput="validate(this.value)" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Author</label>
      <input type="text" class="form-control" name="author" id="author" placeholder="e.g Paul Winterton" oninput="validate(this.value)" required>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
      <textarea class="form-control" name="description" id="description" placeholder="Enter the description of the item here.... " id="exampleFormControlTextarea1" rows="3" style="height: 150px; max-height: 200px; min-height: 150px" required></textarea>
    </div>

    <label for="formGroupExampleInput" class="form-label">Price</label>
    <div class="mb-3 input-group">
      <span class="input-group-text" name="" id="inputGroupPrepend">Rp.</span>
      <input type="text" value="0" class="form-control" id="price" placeholder="in Rupiah currency"  oninput="f_number(this.value)" required>
      <input type="hidden" value="0" name="true_price" id="true-price">
    </div>

      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1" max="1000" class="form-control" oninput="limit(this.value)" required>
      </div>

      <div class="mb-3">
        <label for="picture-file" class="form-label">Picture File</label>
        <input class="form-control" type="file" accept=".JPG" name="picture_file" id="picture-file" required>
      </div>
      
      <input type="submit" class="btn btn-dark" name="submit" id="submit-btn" value="Save">
    </form>
    </div>
  </div>
</div>
</body>
</html>