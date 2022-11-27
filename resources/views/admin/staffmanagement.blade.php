<html>
<head>
<title>ADMIN DASHBOARD</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<!-- fav icon -->
<link rel="shortcut icon" type="images/png" href="images/favicon.png" />
<link rel="stylesheet" href="css/staff.css">
<script src="js/staff.js"></script>

</head>
<body>
            <!-- navbar-->
              <nav class="navbar">
                <div class="row">
                  <div class="col-md-2 navleft">
                    <img src="images/logo.png">
                  </div>
                  <div class="col-md-10 navright">
                    <ul>
                      <li><a href="/staffmanagement">Staff Management</a></li>
                      <li><a href="/productmanagement">Product</a></li>
                      <li><a href="/salesmanagement">Sales</a></li>
                      <li><a href="/logout">Logout</a></li>
                    </ul>
                  </div>
                </div>
              </nav>
             <!-- body-->

             <div class="body">
              <div class="col-md-12 bodyright">
                <div class="staff_table2 table2">
                          <img src="images/staffmanagementicon.png">
                            <h1>Staff Management</h1>
              <div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
                <form name="testform" ng-submit="insertData()">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Branch</th>
                                <th>Position</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                                <td><input type="text" ng-model="addData.first_name" class="form-control" placeholder="Enter First Name" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.last_name" class="form-control" placeholder="Enter Last Name" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.email" class="form-control" placeholder="Email Address" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.phone" class="form-control" placeholder="Phone" ng-required="true" /></td>

                                <td><div class="form-group">
                                    <select class="form-control"   ng-model="addData.branch_id" id="sel1" ng-required="true">
                                      <option>10001 <span> Davao Branch<span></option>
                                    </select>
                                  </div></td>

                                  <td><div class="form-group">
                                    <select class="form-control" ng-model="addData.position_name" id="sel1" ng-required="true">
                                      <option>Staff</option>
                                      <option>Admin</option>
                                    </select>
                                  </div></td>

                               

                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                            </tr>
                        </tbody>
                    </table>
                </form>

 <script type="text/ng-template" id="display">
                    <td>@{{data.staff_id}}</td>
                    <td>@{{data.first_name}}</td>
                    <td>@{{data.last_name}}</td>
                    <td>@{{data.email}}</td>
                    <td>@{{data.phone}}</td>
                    <td>@{{data.branch_id}}</td>
                    <td>@{{data.position_name}}</td>

                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.staff_id)">Delete</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td>
                    <td><input type="text" ng-model="formData.first_name" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.last_name" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.email" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.phone" class="form-control" /></td>

                    <td><div class="form-group">
                        <select class="form-control"   ng-model="addData.branch_id" id="sel1" ng-required="true">
                          <option>10001 <span> Davao Branch<span></option>
                        </select>
                      </div></td>


                    <td><input type="text" ng-model="formData.position_name" class="form-control" /></td>

                    <td>
                        <input type="hidden" ng-model="formData.data.staff_id" />
                        <button type="button" class="btn btn-info btn-sm " ng-click="editData()">Save</button>
                        <button type="button" class="btn btn-default btn-sm " ng-click="reset()">Cancel</button>
                    </td>
                </script>
               </div>
              </div>
            </div>
       </div>
	</body>
</html>


<script>


</script>
