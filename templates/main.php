<!DOCTYPE html>
<html lang="en" ng-app="testApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>

    <!-- Bootstrap -->
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="/assets/css/main.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container" ng-controller="TestController">
        <form class="form-horizontal" ng-submit="submitProduct()" novalidate name="productForm">
            <div class="col-sm-offset-2 col-sm-10"><h2>Add new product</h2></div>
    <!--            Product name, Quantity in stock, Price per item.-->
            <div class="form-group" ng-class="{ 'has-error': productForm.name.$error.required && productForm.name.$dirty }">
                <label for="inputName" class="col-sm-2 control-label">Product name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Product name" ng-model="newProduct.name" name="name" required/>
                </div>
            </div>
            <div class="form-group" ng-class="{ 'has-error': invalidNum(productForm.quantity) }">
                <label for="inputQuantity" class="col-sm-2 control-label">Quantity in stock</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" id="inputQuantity" placeholder="Quantity in stock" ng-model="newProduct.quantity" name="quantity" required>
                </div>
            </div>
            <div class="form-group" ng-class="{ 'has-error': invalidNum(productForm.price) }">
                <label for="inputPrice" class="col-sm-2 control-label">Price per item</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" id="inputPrice" placeholder="Price per item" ng-model="newProduct.price" name="price" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" ng-disabled="productForm.$invalid">Add</button>
                </div>
            </div>
        </form>
        <table class="table table-striped" ng-show="products.length > 0" nc-cloak>
            <caption>Submitted products</caption>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Quantity in stock</th>
                    <th>Price per item</th>
                    <th>Datetime submitted</th>
                    <th>Total value number</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="product in products | orderBy:'-submitted'" ng-cloak>
                    <td>{{product.name}}</td>
                    <td>{{product.quantity}}</td>
                    <td>{{product.price}}</td>
                    <td>{{product.submitted | date:'medium'}}</td>
                    <td>{{product.quantity * product.price | number:2}}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total: </td>
                    <td ng-cloak>{{getTotalPrice() | number:2}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script type="text/javascript" src="/node_modules/angular/angular.min.js"></script>
    <script type="text/javascript" src="/assets/js/app.js"></script>
</body>
</html>