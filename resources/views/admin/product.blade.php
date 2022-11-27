<html>

<head>
    <title>Product Management</title>
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
    <link rel="stylesheet" href="CSS/product.css">
    <script src="js/product.js"></script>
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
            <div class="table-responsive table2" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
            <img src="images/producticon.png">
                <h1>Product Management</h1>
                     <form name="testform" ng-submit="insertData()">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Branch</th>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Category ID</th>
                                <th>Model Year</th>
                                <th>List Price</th>
                                <th>Specifications</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- ASK USER INPUT --------------------------------------------------------------------------------------------------------------->
                        <tbody>
                            <tr>
                                <td>
                                <td><div class="form-group">
                                    <select class="form-control"   ng-model="addData.branch_id" id="sel1" ng-required="true">
                                      <option>10001 <span> Davao Branch<span></option>
                                    </select>
                                  </div></td>
                                <td><input type="text" ng-model="addData.product_name" class="form-control" placeholder="Enter Product Name" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.brand" class="form-control" placeholder="Enter Brand" ng-required="true" /></td>
                                <td><div class="form-group">
                                    <select class="form-control"   ng-model="addData.category_id" id="sel1" ng-required="true">
                                      <option>4000001 <span> Laptop<span></option>
                                      <option>4000002 <span> Printer<span></option>
                                      <option>4000003 <span> Softwares<span></option>
                                      <option>4000004 <span> Peripherals<span></option>

                                    </select>
                                  </div></td>
                                <td><input type="text" ng-model="addData.model_year" class="form-control" placeholder="Enter Model Year" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.list_price" class="form-control" placeholder="Enter List Price" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.specifications" class="form-control" placeholder="Enter Specifications " ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.quantity" class="form-control" placeholder="Enter Quantity" ng-required="true" /></td>
                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)"> </tr>
                        </tbody>
                        <!-------------------------------------------------------------------------------------------------------------------------------->
                    </table>
                </form>
                <script type="text/ng-template" id="display">
                    <!-- do not hilabot this area -->
                    <td>@{{data.product_id}}</td>
                    <td>@{{data.branch_id}}</td>
                    <td>@{{data.product_name}}</td>
                    <td>@{{data.brand}}</td>
                    <td>@{{data.category_id}}</td>
                    <td>@{{data.model_year}}</td>
                    <td>@{{data.list_price}}</td>
                    <td>@{{data.specifications}}</td>
                    <td>@{{data.quantity}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.product_id)">Delete</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td>
                    <td><div class="form-group">
                        <select class="form-control"   ng-model="formData.branch_id" id="sel" ng-required="true">
                          <option>10001 <span> Davao Branch<span></option>
                        </select>
                      </div></td>
                    <td><input type="text" ng-model="formData.product_name" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.brand" class="form-control" /></td>
                    <td><div class="form-group">
                        <select class="form-control"   ng-model="formData.category_id" id="sel1" ng-required="true">
                          <option>4000001 <span> Laptop<span></option>
                          <option>4000002 <span> Printer<span></option>
                          <option>4000003 <span> Softwares<span></option>
                          <option>4000004 <span> Peripherals<span></option>
                        </select>
                      </div></td>
                    <td><input type="text" ng-model="formData.model_year" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.list_price" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.specifications" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.quantity" class="form-control" /></td>
                    <td>
                        <input type="hidden" ng-model="formData.data.product_id" />
                        <button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
                        <button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
                    </td>
                </script>
            </div>
        </div>
    </div>
</body>
</html>
