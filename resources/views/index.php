<!-- app/views/index.php -->

<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Pantry Wizard</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="css/base.css">

    <!-- JS Libs -->
    <script src="js/all.js"></script>

    <!-- OUR ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/app.module.js"></script> <!-- load our application -->
    <script src="js/controllers/main.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/manage.controller.js"></script> <!-- load our controller -->
    <script src="js/services/app.service.js"></script> <!-- load our service -->
    <script src="js/directives/rowlink.directive.js"></script> <!-- load our directives -->
    <script src="js/app.routes.js"></script> <!-- load our routes -->
    <script src="js/app.config.js"></script> <!-- load our config -->
    
    <script>
        angular.module("pantryApp").constant("CSRF_TOKEN", "<?php echo csrf_token() ?>");
    </script>
</head> 
<!-- declare our angular app and controller --> 
<body ng-app="pantryApp"> 

<div class="mainHeader navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" ng-init="navCollapsed = true" ng-click="navCollapsed = !navCollapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#/">
            <img src="images/Icon.png" alt="Pantry Wizard Logo" height="35px"/>
        </a>
    </div>
    <nav class="collapse navbar-collapse" uib-collapse="navCollapsed">
        <ul class="nav navbar-nav">
            <li>
                <a href="#/">Pantry Wizard</a>
            </li>
            <li>
                <a href="#/add-items">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </a>
            </li>
            <li>
                <a href="#/remove-items">
                    <span class="glyphicon glyphicon-minus"></span> Remove
                </a>
            </li>
            <li>
                <a href="#/manage">
                    <span class="glyphicon glyphicon-folder-open"></span> Manage
                </a>
            </li>
            <li>
                <a href="#/recipes">
                    <span class="glyphicon glyphicon-cutlery"></span> Recipes
                </a>
            </li>
            <li>
                <a href="#/statistics">
                    <span class="glyphicon glyphicon-stats"></span> Stats
                </a>
            </li> 
        </ul>
        <ul class="nav navbar-nav navbar-right" id="userHeader">
            <li uib-dropdown class="dropdown">
                <a href uib-dropdown-toggle>
                    <span class="glyphicon glyphicon-user"> <?php echo Auth::user()->name; ?>
                    <i class="icon-sort-down"></i>
                </a>
                <ul class="dropdown-menu pull-right" uib-dropdown-menu>
                    <li>
                        <a href="">Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <form class="navbar-form navbar-right navbar-input-group" role="search">
            <div class="input-group">
                <input class="form-control" placeholder="Search" type="text" ng-model="searchParam">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-secondary" ng-click="globalAPI.search()"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </form>
    </nav>
</div>

<div id="mainContent" class="extra-padding container" ng-view>

</div>

</body> 
</html>