<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="@{{ csrf_token }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>小元元博客</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       
        <!-- Styles -->
    </head>
    <body>
       <div id="app">
           <home-layout></home-layout>
       </div>
    </body>
</html>
<script type="text/javascript" src="js/app.js"></script>
