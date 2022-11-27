<?php
use Illuminate\Support\Facades\DB;
?>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profile.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- fav icon -->
    <link rel="shortcut icon" type="images/png" href="images/favicon.png" />
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
    <h1>Profile</h1>
        <div class="row">
            <div class="col-md-3">
                <img src="images/avatar.png" class="border border-secondary" width="250">
            </div>
            <div class="col-md-9 card-body">
                <div class="row">
                  <div class="col-md-2">
                    <h5>Full Name</h5>
                  </div>
                  <div class="col-md-10 text-secondary">
                    <?php
                    $user = DB::table('staffs')->where('staff_id', session('staff_id'))->first();

                  echo $user->first_name." ".$user->last_name;
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h5>Staff ID</h5>
                  </div>
                  <div class="col-md-10 text-secondary">
                  <?php
                    $user = DB::table('staffs')->where('staff_id', session('staff_id'))->first();

                  echo $user->staff_id;
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h5>Contact No.</h5>
                  </div>
                  <div class="col-md-10 text-secondary">
                  <?php
                    $user = DB::table('staffs')->where('staff_id', session('staff_id'))->first();

                  echo $user->phone;
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h5>Phone</h5>
                  </div>
                  <div class="col-md-10 text-secondary">
                  <?php
                    $user = DB::table('staffs')->where('staff_id', session('staff_id'))->first();

                  echo $user->phone;
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h5>Email</h5>
                  </div>
                  <div class="col-md-10 text-secondary">
                  <?php
                    $user = DB::table('staffs')->where('staff_id', session('staff_id'))->first();

                  echo $user->email;
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h5>Branch_ID</h5>
                  </div>
                  <div class="col-md-10 text-secondary">
                  <?php
                    $user = DB::table('staffs')->where('staff_id', session('staff_id'))->first();

                  echo $user->branch_id;
                    ?>
                  </div>
                </div>
                
            </div>
        </div>
    </div>    



</body>
</html>