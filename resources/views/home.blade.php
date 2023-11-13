<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>E-Crime Reporting App</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        {{--        <script src="{{ mix('css/app.scss') }}"></script>--}}
    </head>
    <body id="app">
        <router-view></router-view>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
