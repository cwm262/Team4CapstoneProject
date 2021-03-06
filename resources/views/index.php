<!-- app/views/index.php -->

<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Pantry Wizard</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <link href="favicon.ico" rel="icon" type="image/x-icon" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/all.css">

    <!-- JS Libs -->
    <script src="js/all.js"></script>

    <!-- OUR ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/app.module.js"></script> <!-- load our application -->
    <script src="js/controllers/main.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/manage.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/add.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/remove.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/recipe.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/inventoryModal.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/addItemModal.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/recipeModal.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/shoppingListModal.controller.js"></script> <!-- load our controller -->
    <script src="js/controllers/stats.controller.js"></script>
    <script src="js/services/notification.service.js"></script> <!-- load our alert service -->
    <script src="js/services/alert.service.js"></script> <!-- load our alert service -->
    <script src="js/services/stats.service.js"></script>
    <script src="js/services/item.service.js"></script> <!-- load our item service -->
    <script src="js/services/inventory.service.js"></script> <!-- load our item service -->
    <script src="js/services/shoppingList.service.js"></script> <!-- load our item service -->
    <script src="js/services/recipe.service.js"></script> <!-- load our item service -->
    <script src="js/directives/rowlink.directive.js"></script> <!-- load our directives -->
    <script src="js/directives/starRating.directive.js"></script> <!-- load our directives -->
    <script src="js/filters/storageType.filter.js"></script> <!-- load our storage type conversion filter -->
    <script src="js/filters/dateFormat.filter.js"></script>
    <script src="js/app.routes.js"></script> <!-- load our routes -->
    <script src="js/app.config.js"></script> <!-- load our config -->
    
    <script>
        angular.module("pantryApp").constant("CSRF_TOKEN", "<?php echo csrf_token() ?>");
        angular.module("pantryApp").constant("USER_ID", "<?php echo Auth::user()->id?>")
    </script>
</head> 
<!-- declare our angular app and controller --> 
<body ng-app="pantryApp"> 

<div class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" ng-init="navCollapsed = true" ng-click="navCollapsed = !navCollapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#/">
            <img src="images/wizard.png" alt="Food Logo" height="45px"/>
        </a>
        <a class="navbar-brand" href="#/" id="textLogo">PANTRY WIZARD</a>
    </div>
    <nav class="collapse navbar-collapse" uib-collapse="navCollapsed">
        <ul class="nav navbar-nav navbar-right" id="userHeader">
            <li uib-dropdown class="dropdown">
                <a href uib-dropdown-toggle>
                    <span class="glyphicon glyphicon-user"></span> <?php echo Auth::user()->name; ?>
                </a>
                <ul class="dropdown-menu pull-right" uib-dropdown-menu>
                    <li>
                        <a href="<?php echo url('/logout') ?>"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-log-out"></span> Logout
                        </a>

                        <form id="logout-form" action="<?php echo url('/logout') ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
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
        
    </nav>
</div>

<div class="alertBox" ng-cloak>
    <div uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="alert.close()">{{alert.msg}}</div>
</div>

<div ng-view>

</div>

</body> 
</html>