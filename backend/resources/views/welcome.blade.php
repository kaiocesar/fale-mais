<!DOCTYPE html>
<html ng-app="planos">
    <head>
        <title>API Telzir</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            /*html, body {*/
                /*height: 100%;*/
            /*}*/

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            /*.container {*/
                /*text-align: center;*/
                /*display: table-cell;*/
                /*vertical-align: middle;*/
            /*}*/

            /*.content {*/
                /*text-align: center;*/
                /*display: inline-block;*/
            /*}*/

            /*.title {*/
                /*font-size: 96px;*/
            /*}*/
        </style>
    </head>
    <body ng-controller="PlanosController">

        <div class="container">
            <div class="page-header text-center">
                <h1>Consulte seu consumo de dados</h1>
            </div>
            <div ng-view></div>
        </div>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script type="text/javascript" src="https://code.angularjs.org/1.4.3/angular-route.min.js"></script>
        <script type="text/javascript" src="https://code.angularjs.org/1.4.3/angular-resource.min.js"></script>

        <script src="/assets/js/all.js"></script>

    </body>
</html>
