<!DOCTYPE html>
<html>

<head>
    <title>Welcome To ProTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" />
    <!-- fav icon -->
    <link rel="shortcut icon" type="images/png" href="favicon.png" />

</head>

<style>
    .btn-primary {
        color: rgb(2, 3, 3);
        background-color: #3D845C;
        border-color: #242929;
    }

    img,
    svg {
        vertical-align: middle;
        padding: 2rem;
    }

    .btn-primary {
        color: #fff;
        background-color: #3D845C;
        border-color: #64c7ca;
    }
</style>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">

        <img src="images/ProTech.png" alt="ProTech Logo" />


        <form class="border shadow p-3 rounded" action="/changePW" method="post" style="width: 450px;">


            @csrf
            <h1 class="text-center p-3">Welcome New Employee</h1>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Please input your desired credentials so that you can start using the system and get to work.
            </div>


            @if ($message = Session::get('nousers'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
            </div>
            @endif
            @if ($message = Session::get('exist'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
            </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" id="username">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="changePW" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label>Confirm Password: </label>
                <input type="password" class="form-control" name="confirm_password" id="confirmPW" onkeyup='check();'>
                <br>
                <label id="alertinfo" style="display: none;">Password Credentials not matched</label>
            </div>

            <button type="submit" id="submitBtn" class="btn btn-primary col-12" disabled>LOGIN</button>
        </form>
    </div>
    <script>
        var check = function() {
            if (document.getElementById('changePW').value == document.getElementById('confirmPW').value) {
                document.getElementById('alertinfo').style.display = 'block';
                document.getElementById('alertinfo').style.color = 'green';
                document.getElementById('alertinfo').innerHTML = 'password matched';
                document.getElementById('submitBtn').disabled = false;
            } else {
                document.getElementById('alertinfo').style.display = 'block';
                document.getElementById('alertinfo').style.color = 'red';
                document.getElementById('alertinfo').innerHTML = 'password not matched';
                document.getElementById('submitBtn').disabled = true;

            }
        }
    </script>
</body>

</html>