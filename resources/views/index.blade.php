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
			img,svg {
				vertical-align: middle;
				padding:2rem;
			}

			.btn-primary {
				color: #fff;
				background-color:#3D845C;
				border-color: #64c7ca;
			}
			

	</style> 

<body>

	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">

		<img src="images/ProTech.png" alt="ProTech Logo" />


		<form class="border shadow p-3 rounded" action="/login" method="post" style="width: 450px;">
		
			
			@csrf
			<h1 class="text-center p-3">LOGIN</h1>

			@if ($message = Session::get('welcome'))
			<div class="alert alert-success" role="alert" style="text-align:center;">
			<b>{{$message}}</b>
			</div>
			@endif
			<div class="mb-3">
				<label for="username" class="form-label">Username</label>
				<input type="text" class="form-control" name="username" id="username">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" name="password" class="form-control" id="password">
			</div>
			<div class="mb-1">
				<label class="form-label">Select User Type:</label>
			</div>
			<select class="form-select form-control mb-3" name="role" aria-label="Default select example">
			<option value="none" selected disabled hidden>Position</option>	
			<option value="Staff">Staff</option>	
				<option value="Admin">Admin</option>
			</select>
<br>	
			@if ($message = Session::get('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Invalid Credentials, Please try again.
			</div>
			@endif

			@if ($message = Session::get('accessDenied'))
			<div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align:center;">
			<b>{{$message}}</b>
			</div>
			@endif

			@if ($message = Session::get('accessDenied2'))
			<div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align:center;">
			<b>{{$message}}</b>
			</div>
			@endif
			<button type="submit" class="btn btn-primary col-12" style="margin-bottom:5px">LOGIN</button><br>
			<a href="/newemp" style="text-decoration:none;">New Employee</a>
		</form>
	</div>
</body>

</html>