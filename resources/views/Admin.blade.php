<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="@{{ csrf_token }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>博客后台</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/public.css" />
        <!-- Styles -->
        <style>
          /*定义滚动条高宽及背景 高宽分别对应横竖滚动条的尺寸*/
          ::-webkit-scrollbar
          {
              width: 3px;
              height: 3px;
              background-color:#f2f2f2
          }
          /*定义滚动条轨道 内阴影+圆角*/
          ::-webkit-scrollbar-track
          {
              -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
              border-radius: 3px;
              background-color: #F5F5F5;
          }
           
          /*定义滑块 内阴影+圆角*/
          ::-webkit-scrollbar-thumb
          {
              border-radius: 3px;
              -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
              background-color: #999
          }

        </style>
    </head>
    <body>
       <script type="text/javascript" src="http://static.nxin.com/plug/help/index.js"></script>
       <div id="app">
           <admin-layout></admin-layout>
       </div>
    </body>
</html>
<script type="text/javascript" src="js/app.js"></script>

<script>
    // NxinPlug.help();
</script>
