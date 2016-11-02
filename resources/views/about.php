<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Pantry Wizard</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet"> 
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/all.css">

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
        <a class="navbar-brand" href="/">
            <img src="images/wizard.png" alt="Food Logo" height="45px"/>
        </a>
        <a class="navbar-brand" href="/" id="textLogo">PANTRY WIZARD</a>
    </div>
</div>

<div class="container default-top-spacer">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2 style="display:inline-block">Welcome to Pantry Wizard</h2><a href="/login" class="pull-right">Return to login</a></div>
                <div class="panel-body">
                    <h4>The Problem:</h4>
                    <ul>
                        <li>There is no quick and easy way to tell exactly what foods you may have in your home.</li>
                        <li>Many households end up buying extra ingredients that they may have already had. This causes a lot of food to go to waste.</li>
                        <li>Everyone at one point or another has cleaned out their fridge to find some kind of rotten food left and forgotten about in the back.</li>
                        <li>You may already have all that you need to whip up an amazing recipe, but you don't know what it is.</li>
                    </ul>
                    <h4>Pantry Wizard is The Solution:</h4>
                    <ul>
                        <li>Scan-in every food-item that you purchase to let Pantry Wizard track it for you.</li>
                        <li>Pantry Wizard notifies you when your items are about to expire.</li>
                        <li>Pantry Wizard recommends recipes based on what you have in stock. With Pantry Wizard, you can add or customize any recipe you like.</li>
                        <li>Pantry Wizard will generate a shopping list for you!</li>
                    </ul>
                    <h4>Please <a href="/register">register</a> (fast and easy) then log in to begin using Pantry Wizard!</h4>
                </div>
            </div>
        </div>
    </div>
</div>

</body> 
</html>