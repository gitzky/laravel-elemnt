<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="@{{ csrf_token }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/public.css" />
        <link rel="stylesheet" type="text/css" href="css/common.css" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
        <link href="favicon.ico" rel="shortcut icon"/>
        <link rel="stylesheet" type="text/css" href="css/article.css"/>
        <link rel="stylesheet" type="text/css" href="css/about.css"/>
        <link href="plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="plugin/jquery.min.js"></script>
        <script src="plugin/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="plugin/jquery.page.js"></script>
        <title>小元元博客</title>

        
        <!-- Styles -->
    </head>
    <body>
       <div id="app">
           <home-layout></home-layout>
       </div>
    </body>
</html>
<script type="text/javascript" src="js/app.js"></script>
