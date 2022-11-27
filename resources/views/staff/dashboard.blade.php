<?php

use Illuminate\Support\Facades\DB;
?>
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- fav icon -->
  <link rel="shortcut icon" type="images/png" href="images/favicon.png" />
  <link rel="stylesheet" href="css/dashboard.css">
  <script src="js/dashboard.js"></script>

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="row">
      <div class="col-md-2 navleft">
        <img src="images/logo.png">
      </div>

      <div class="col-md-10 navright">
        <ul>
          <li><a href="/staffdashboard">Dashboard</a></li>
          <li><a href="/customermanagement">Customer Management</a></li>
          <li><a href="/profile">My Profile</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </div>
    </div>

  </nav>

  <div class="body">


    <div class="container-fluid" style="margin-top: 50px;">




      <div class="row">
        <h1> Dashboard</h1>


        <form action="/receipt" method="post">
          @csrf
          <div class="col-md-12">
          @if ($message = Session::get('amountpaiderror'))
        <div class="alert alert-warning" role="alert">
          <b>{{$message}}</b>
        </div>
        @endif
        @if ($message = Session::get('StockEmpty'))
        <div class="alert alert-warning" role="alert">
          <b>{{$message}}</b>
        </div>
        @endif
          @if ($message = Session::get('orderDone'))
        <div class="alert alert-success" role="alert">
          <b>{{$message}}</b>
        </div>
        @endif
        @if ($message = Session::get('nocustomer'))
        <div class="alert alert-warning" role="alert">
          <b>{{$message}}</b>
        </div>
        @endif
            @if ($message = Session::get('notify'))
            <div class="alert alert-success" role="alert">
              <span style="padding-right:700px;"><b>{{$message}}</b></span> <span style="margin-right:20px ;"> Enter Amount:</span><input type="text" name="amount_paid"><input type="submit" value="Finish Order" style="margin-left:20px ;">
            </div>
            @endif
          </div>

          <input type="hidden" id="cust_id"name="hdcustomer_id" value="<?php echo session('customer_id'); ?> ">
          <input id="hdorder_id" type="hidden" name="hdorder_id" value="<?php echo session('order_id');?>">
          <input id="hdtotalamount" type="hidden" name="hdtotalamount" value="<?php echo session('total_amount'); ?>" < >
          <input type="hidden" name="quantity" value="<?php echo session('quantity'); ?>">

          <script>

          </script>
        </form>


        @if ($message = Session::get('checkoutnull'))
        <div class="alert alert-success" role="alert">
          <b>{{$message}}</b>
        </div>
        @endif
        @if ($message = Session::get('selectError'))
        <div class="alert alert-success" role="alert">
          <b>{{$message}}</b>
        </div>
        @endif
        @if ($message = Session::get('FatalError'))
        <div class="alert alert-success" role="alert">
          <b>{{$message}}</b>
        </div>
        @endif
      </div>
    </div>
    <br>
    <div class="row">

      <div class="col-md-4">
        <script>
          function selects() {
            var ele = document.getElementsByName('checkout[]');
            for (var i = 0; i < ele.length; i++) {
              if (ele[i].type == 'checkbox')
                ele[i].checked = true;
            }
          }
        </script>
        <script>

        </script>

        <form action="/checkout" method="post"> @csrf
          <label for=""><b>Cart</b></label> <span style="float:right; margin-left:10px;"><button class="btn btn-danger btn-sm">Remove</button></span>
          <span style="float:right;"> <input type="text" name="customer_id" placeholder="Customer ID"> <button class="btn btn-success btn-sm" onclick="selects()">Check out</button></span>
          <table class="table table-striped">
            <thead>

              <th><button class="btn btn-primary btn-sm" type="button" onclick="selects()">Select All</button></th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>

            </thead>
            <tbody id="spam">

            </tbody>
          </table>
        </form>
      </div>
      <div class="col-md-8">
        <form action="/addtocart" method="post"> @csrf
          <label for=""><b>Product List</b></label> <span style="float:right;"><button type="button" onclick="addtocart();" class="btn btn-success btn-sm">Add to Cart</button></span>
          <table class="table table-striped">
            <thead>
              <th>Select</th>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Brand</th>
              <th>Model Year</th>
              <th>Price</th>
            </thead>

            <tbody>

              <?php
              $product = DB::table('product')->get();
              foreach ($product as $prod) {
                echo "<tr> 
          <td><input type='checkbox' value='$prod->product_id'  name='cart[]' id='$prod->product_id'></td>
          <input type='hidden' name='name[]' value='$prod->product_name'>
          <input type='hidden' name='price[]' value='$prod->list_price'>
          <td>$prod->product_id</td>
          <td>$prod->product_name</td>
          <td>$prod->brand</td>
          <td>$prod->model_year</td>
          <td>$prod->list_price</td>
          
        </tr>";
              }
              ?>
        </form>
        </tbody>
        </table>
      </div>
      <script>
        window.onload = () =>
          document.querySelectorAll(".input-x")
          .forEach(input => input.addEventListener("change", calculatePrize));

        function calculatePrize() {
          let sum = 0;
          document.querySelectorAll(".input-x")
            .forEach(input => sum += (input.checked ?
              Number.parseFloat(input.getAttribute("data-price")) : 0));
          document.getElementById("total").value = sum;
        }
      </script>
    </div>
    <!-- here -->
  </div>
  <script>
  </script>
  </div>
</body>

</html>