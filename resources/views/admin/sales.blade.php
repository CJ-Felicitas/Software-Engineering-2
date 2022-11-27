<html>
<head>
<title>Sales Record</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<!-- fav icon -->
<link rel="shortcut icon" type="images/png" href="images/favicon.png" />
<link rel="stylesheet" href="css/sales.css">
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
              
            <img src="images/salesicon.png">
             <h1>Sales Record</h1>
              <div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
                <form name="testform" ng-submit="insertData()">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer ID</th>
                                <th>Order Date</th>
                                <th>Branch ID</th>
                                <th>Staff ID</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)"> </tr>  
                        </tbody>
                    </table>
                </form>   
 <script type="text/ng-template" id="display">
                    <td>@{{data.order_id}}</td>
                    <td>@{{data.customer_id}}</td>
                    <td>@{{data.order_date}}</td>
                    <td>@{{data.branch_id}}</td>
                    <td>@{{data.staff_id}}</td>
                </script>                
               </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
  </body>
</html>


<script>
var app = angular.module('liveApp', []);

app.controller('liveController', function($scope, $http){

    $scope.formData = {};
    $scope.addData = {};
    $scope.success = false;

    $scope.getTemplate = function(data){
        if (data.order_id === $scope.formData.order_id)
        {
            return 'edit';
        }
        else
        {
            return 'display';
        }
    };

    $scope.fetchData = function(){
        $http.get('scripts/sales_select.php').success(function(data){
            $scope.namesData = data;
        });
    };
});

</script>
