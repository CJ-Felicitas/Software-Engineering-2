<html>
<head>
    <title>Customer Management</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <link rel="stylesheet" href="css/customer.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- fav icon -->
    <link rel="shortcut icon" type="images/png" href="images/favicon.png" />
    <script src="js/customer.js"></script>
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


    <!-- body-->
    <div class="body">
        
        <div class="col-md-12 bodyright">
            <div class="customer_table2">
                        <img src="images/customermanagementicon.png">
                            <h1>Customer Management</h1>
                            <br>
                <div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
                    <form name="testform" ng-submit="insertData()">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Street</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <td><input type="text" ng-model="addData.first_name" class="form-control" placeholder="Enter First Name" ng-required="true" /></td>
                                    <td><input type="text" ng-model="addData.last_name" class="form-control" placeholder="Enter Last Name" ng-required="true" /></td>
                                    <td><input type="text" ng-model="addData.phone" class="form-control" placeholder="Phone" ng-required="true" /></td>
                                    <td><input type="text" ng-model="addData.email" class="form-control" placeholder="Email Address" ng-required="true" /></td>
                                    <td><input type="text" ng-model="addData.street" class="form-control" placeholder="Street" ng-required="true" /></td>
                                    <td><input type="text" ng-model="addData.city" class="form-control" placeholder="City" ng-required="true" /></td>
                                    <td><input type="text" ng-model="addData.zip_code" class="form-control" placeholder="Zip Code" ng-required="true" /></td>
                                    <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                                </tr>
                                <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                                </tr>
                            </tbody>
                        </table>
                    </form>

                    <script type="text/ng-template" id="display">
                        <td>@{{data.customer_id}}</td>
                    <td>@{{data.first_name}}</td>
                    <td>@{{data.last_name}}</td>
                    <td>@{{data.phone}}</td>
                    <td>@{{data.email}}</td>
                    <td>@{{data.street}}</td>
                    <td>@{{data.city}}</td>
                    <td>@{{data.zip_code}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.customer_id)">Delete</button>
                    </td>
                </script>
                    <script type="text/ng-template" id="edit">
                        <td>
                    <td><input type="text" ng-model="formData.first_name" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.last_name" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.phone" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.email" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.street" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.city" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.zip_code" class="form-control" /></td>
                    <td>
                        <input type="hidden" ng-model="formData.data.customer_id" />
                        <button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
                        <button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
                    </td>
                </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>